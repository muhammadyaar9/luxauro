<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductType;
use App\Models\Admin\ShippingType;
use App\Http\Controllers\Controller;
use App\Models\Admin\DelivoryOption;
use Illuminate\Support\Facades\Validator;

class VendorProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','vendor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $products = Product::with('category', 'productType', 'delivoryOption', 'shippingType','user')->where('user_id',auth()->user()->id)->get();
        return view('frontend.vendor.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $productType = ProductType::all();
        $delivoryOption = DelivoryOption::all();
        $shippingType = ShippingType::all();
        return view('frontend.vendor.product.create', compact('categories', 'productType', 'delivoryOption', 'shippingType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_description'=>'required',
            'tags'=>'required',
            'product_type_id' => 'required',
            'product_category_id' => 'required',
            'delivory_option_id' => 'required',
            'shipping_type_id' => 'required',
            'shipping_charge' => 'required',
            'product_image' => 'required',
            'status'=>'required',
            'user_id'=>'required',
            'multiple_image'=>'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Added Failed');
        } else {
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->category_id = $request->product_category_id;
            $product->product_type_id = $request->product_type_id;
            $product->delivory_option_id = $request->delivory_option_id;
            $product->shipping_type_id = $request->shipping_type_id;
            $product->shipping_charge = $request->shipping_charge;
            $product->status = $request->status;
            $product->user_id = $request->user_id;
            if ($request->hasFile('product_image')) {
                $path = asset('storage/'.$request->product_image->store('product'));
                $product->image = $path;
            }
            if ($request->hasFile('multiple_image')) {
                $images = [];
                foreach ($request->multiple_image as $image) {
                    $path = asset('storage/'.$image->store('product'));
                    array_push($images, $path);
                }
                $product->multiple_image = json_encode($images);
            }
            $product->save();
            $tags = explode(",", $request->tags);
            $product->tag($tags);
            return redirect()->route('vendor-product.index')->with('success', 'Product Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category', 'productType', 'delivoryOption', 'shippingType','user')->find($id);
        $categories = Category::all();
        $productType = ProductType::all();
        $delivoryOption = DelivoryOption::all();
        $shippingType = ShippingType::all();
        return view('frontend.vendor.product.edit', compact('product', 'categories', 'productType', 'delivoryOption', 'shippingType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_description'=>'required',
            'tags'=>'required',
            'product_type_id' => 'required',
            'product_category_id' => 'required',
            'delivory_option_id' => 'required',
            'shipping_type_id' => 'required',
            'shipping_charge' => 'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Added Failed');
        } else {
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->category_id = $request->product_category_id;
            $product->product_type_id = $request->product_type_id;
            $product->delivory_option_id = $request->delivory_option_id;
            $product->shipping_type_id = $request->shipping_type_id;
            $product->shipping_charge = $request->shipping_charge;
            $product->status = $request->status;
            $product->user_id = $request->user_id;
            if ($request->hasFile('product_image')) {
                $path = asset('storage/'.$request->product_image->store('product'));
                $product->image = $path;
            }
            $product->save();
            $tags = explode(",", $request->tags);
            $product->retag($tags);
            return redirect()->route('vendor-product.index')->with('success', 'Product Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('vendor-product.index')->with('success', 'Product Deleted Successfully');
    }
}
