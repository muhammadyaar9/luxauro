<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Cart;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\MerchantApplication;
use Illuminate\Console\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SelectProjectBenefits;
use Illuminate\Support\Facades\Cache;



class ProductMangeCotroller extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','admin']);
    // }
    public function suspended(Request $request)
    {
        $suspended = Product::find($request->suspended_id);
        $suspended->status = 'Active';
        $suspended->save();
        return response()->json(['success' => 'Product Suspended Successfully.']);
    }

    public function active(Request $request)
    {
        $active = Product::find($request->active_id);
        $active->status = 'Suspended';
        $active->save();
        return response()->json(['success' => 'Product Active Successfully.']);
    }

    public function productcategory(Request $request, $id, $slug)
    {
        $products = Product::with('categories', 'productType', 'delivoryOption', 'shippingType', 'user')
            ->where('status', 'Active')
            ->where('category_id', $id)
            ->paginate(15);

        if (Cache::has('related_products_' . $id)) {
            // $relatedProducts = Cache::get('related_products_' . $id);
            $product = Category::with('products')->where('id', $id)->first();
            $relatedProducts = $product->products()->get();
        } else {
            $product = Category::with('products')->where('id', $id)->first();
            $relatedProducts = $product->products()->get();
            Cache::put('related_products_' . $id, $relatedProducts, 1440);
        }
        $banner = Banner::orderby('id', 'desc')->where('status', 'active')->first();
        return view('frontend.all-page.category_detail', compact('products', 'id', 'slug', 'relatedProducts', 'banner'));
    }

    public function productDetails(Request $request, $id, $slug)
    {
        $product = Product::with('ratings', 'categories', 'productType', 'deliveryOption', 'shippingType', 'user')->where('id', $id)->first();
        $productsdesc = Product::with('ratings', 'categories', 'productType', 'deliveryOption', 'shippingType', 'user')->where('status', 'Active')->orderby('id', 'desc')->paginate(15);
        $productsasc = Product::with('ratings', 'categories', 'productType', 'deliveryOption', 'shippingType', 'user')->where('status', 'Active')->orderby('id', 'asc')->paginate(15);
        $mayyoulike = Product::with('ratings', 'categories', 'productType', 'deliveryOption', 'shippingType', 'user')->where('status', 'Active')->inRandomOrder()->paginate(15);
        $suits = MerchantApplication::all();
        return view('frontend.all-page.product_detail', compact('product', 'id', 'slug', 'productsdesc', 'productsasc', 'mayyoulike' , 'suits'));
    }


    public function addtocart(Request $request)
    {


        if (Auth::check()) {

            $orderallready = Cart::where('product_id', $request->product_id)->where('status', 'Pending')->where('user_id', Auth::user()->id)->first();
            $quantity = 0;
            if (isset($orderallready->quantity)) {
                $quantity = $orderallready->quantity;
            }
        } else {
            $orderallready = Cart::where('product_id', $request->product_id)->where('status', 'Pending')->where('temp_id', session()->get('temp_id'))->first();
            $quantity = 0;
            if (isset($orderallready->quantity)) {
                if (isset($orderallready->quantity)) {
                    $quantity = $orderallready->quantity;
                }
            }
        }



        if ($quantity >=  $request->quantity) {
            return response()->json(['success' => 'Product Already Added To Cart.']);
        } else {
            if (Auth::check()) {

                if (isset($orderallready->quantity)) {
                    $cart =  Cart::find($orderallready->id);
                    $success = 'Product updated To Cart Successfully';
                } else {
                    $cart = new Cart();
                    $success = 'Product Added To Cart Successfully.';
                }
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $request->product_id;
                $cart->quantity = $request->quantity;
                $cart->total_price = $request->total;
                $cart->status = 'Pending';
                $cart->save();
                $product = Product::where('id', $request->product_id)->first();
                $total = \App\Models\Admin\Cart::with('product')
                    ->where(function ($query) {
                        $query
                            ->where('status', 'pending')
                            ->where('user_id', Auth::id())
                            ->orWhere(function ($query) {
                                $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                            });
                    })
                    ->sum('total_price');
                // $count = Cart::where('user_id', Auth::user()->id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
                $count = \App\Models\Admin\Cart::with('product')
                    ->where(function ($query) {
                        $query
                            ->where('status', 'pending')
                            ->where('user_id', Auth::id())
                            ->orWhere(function ($query) {
                                $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                            });
                    })
                    ->count();
                $selectBenefit = SelectProjectBenefits::with('project_benefit')->where('user_id', Auth::user()->id)->where('status', 'pending')->count();

                return response()->json(['success' =>  $success , 'cart' => $request->all(), 'temp_id' => Auth::user()->id, 'total' => $total, 'count' => $count + $selectBenefit, 'id' =>  $cart->id, 'product' => $product]);
            } else {
                $product = Product::where('id', $request->product_id)->first();
                if (session()->has('temp_id')) {
                    $temp_id = session()->get('temp_id');
                    if (isset($orderallready->quantity)) {
                        $cart =  Cart::find($orderallready->id);
                        $success = 'Product updated To Cart Successfully';
                    } else {
                        $cart = new Cart();
                        $success = 'Product Added To Cart Successfully.';
                    }
                    $cart->temp_id = $temp_id;
                    $cart->product_id = $request->product_id;
                    $cart->quantity = $request->quantity;
                    $cart->total_price = $request->total;
                    $cart->user_id = "0";
                    $cart->status = 'Pending';
                    $cart->save();


                    $total = \App\Models\Admin\Cart::with('product')
                        ->where(function ($query) {
                            $query
                                ->where('status', 'pending')
                                ->where('user_id', Auth::id())
                                ->orWhere(function ($query) {
                                    $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                                });
                        })
                        ->sum('total_price');

                    // $total = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');

                    // $count = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
                    $count = \App\Models\Admin\Cart::with('product')
                        ->where(function ($query) {
                            $query
                                ->where('status', 'pending')
                                ->where('user_id', Auth::id())
                                ->orWhere(function ($query) {
                                    $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                                });
                        })
                        ->count();
                    return response()->json(['success' =>  $success , 'cart' => $request->all(), 'temp_id' => $temp_id, 'total' => $total, 'count' => $count, 'id' =>  $cart->id, 'product' => $product]);
                } else {
                    $temp_id = random_int(1000, 9999);
                    $cart = new Cart();
                    $cart->temp_id = $temp_id;
                    $cart->product_id = $request->product_id;
                    $cart->quantity = $request->quantity;
                    $cart->total_price = $request->total;
                    $cart->status = 'Pending';
                    $cart->save();
                    $request->session()->put('temp_id', $temp_id);

                    $total = \App\Models\Admin\Cart::with('product')
                        ->where(function ($query) {
                            $query
                                ->where('status', 'pending')
                                ->where('user_id', Auth::id())
                                ->orWhere(function ($query) {
                                    $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                                });
                        })
                        ->sum('total_price');
                    // $total = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');

                    $count = \App\Models\Admin\Cart::with('product')
                        ->where(function ($query) {
                            $query
                                ->where('status', 'pending')
                                ->where('user_id', Auth::id())
                                ->orWhere(function ($query) {
                                    $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                                });
                        })
                        ->count();
                    // $count = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
                    $product = Product::where('id', $request->product_id)->first();


                    return response()->json(['success' => 'Product Added To Cart Successfully.', 'cart' => $request->all(), 'temp_id' => $temp_id, 'total' => $total, 'count' => $count, 'id' =>  $cart->id, 'product' => $product]);
                }
            }
        }
    }

    public function orderdestroy(Request $request)
    {

        // return $request->all();
        $cart = Cart::find($request->destroy_id);
        $cart->delete();

        if (Auth::check()) {
            $total = \App\Models\Admin\Cart::with('product')
                ->where(function ($query) {
                    $query
                        ->where('status', 'pending')
                        ->where('user_id', Auth::id())
                        ->orWhere(function ($query) {
                            $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                        });
                })
                ->sum('total_price');

            $count = \App\Models\Admin\Cart::with('product')
                ->where(function ($query) {
                    $query
                        ->where('status', 'pending')
                        ->where('user_id', Auth::id())
                        ->orWhere(function ($query) {
                            $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                        });
                })
                ->count();
            $selectBenefit = SelectProjectBenefits::with('project_benefit')->where('user_id', Auth::user()->id)->where('status', 'pending')->count();
            // $total = Cart::where('user_id', Auth::user()->id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');
            // $count = Cart::where('user_id', Auth::user()->id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
            return response()->json(['success' => 'Product Deleted From Cart Successfully.', 'total' => $total, 'count' => $count +  $selectBenefit]);
        } else {
            $total = \App\Models\Admin\Cart::with('product')
                ->where(function ($query) {
                    $query
                        ->where('status', 'pending')
                        ->where('user_id', Auth::id())
                        ->orWhere(function ($query) {
                            $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                        });
                })
                ->sum('total_price');

            $count = \App\Models\Admin\Cart::with('product')
                ->where(function ($query) {
                    $query
                        ->where('status', 'pending')
                        ->where('user_id', Auth::id())
                        ->orWhere(function ($query) {
                            $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                        });
                })
                ->count();

            $temp_id = session()->get('temp_id');
            // $total = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');
            // $count = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
            return response()->json(['success' => 'Product Deleted From Cart Successfully.', 'total' => $total, 'count' => $count]);
        }
    }

    public function localluxauro(Request $request)
    {
        $products = Product::with('category', 'productType', 'delivoryOption', 'shippingType', 'user')->where('status', 'Active')->orderby('id', 'desc')->get();
        $relatedProducts = Product::with('category', 'productType', 'delivoryOption', 'shippingType', 'user')->where('status', 'Active')->inRandomOrder()->get();
        return view('frontend.all-page.localproductdetail', compact('products', 'relatedProducts'));
    }


    public function allcategory()
    {
        $categories = Category::with('products')->get();
        // dd($categories);
        return view('frontend.all-page.category.index', compact('categories'));
    }

    public function productType($id)
    {
        $productType = Product::find($id);
        $productType->product_status_type = "Featured";
        $productType->save();
        return redirect()->back()->with('status', 'Product Type Added Successfully.');
    }

    public function productTypenormal($id)
    {
        $productType = Product::find($id);
        $productType->product_status_type = "Normal";
        $productType->save();
        return redirect()->back()->with('status', 'Product Type Added Successfully.');
    }
}
