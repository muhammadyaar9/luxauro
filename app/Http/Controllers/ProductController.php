<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\DeliveryOption as AdminDeliveryOption;
use App\Models\Admin\ProductType;
use App\Models\Admin\DeliveryOption;

class ProductController extends Controller
{

    public function productManagement()
    {
        $categories = Category::all();
        $delivery_options = AdminDeliveryOption::all();
        $product_types = ProductType::all();
        $products = Product::with('categories', 'deliveryOption', 'shippingType')->where('user_id', auth()->user()->id)->get();
        return view('frontend.charters.product_management', compact('products', 'product_types', 'categories', 'delivery_options'));
    }


    public function productsearch(Request $request)
    {
        $search = $request->search;
        $products = Product::where('status', 'Active')->where('product_name', 'like', '%' . $search . '%')->paginate(20);
        return view('frontend.all-page.search.index', compact('products'));
    }

    public function allProducts(Request $request)
    {
        $perPage = $request->input('perPage', 20);
        $products = Product::where('status', 'Active')->paginate($perPage);
        $productsassending = Product::where('status', 'Active')->orderBy('id', 'asc')->paginate(20);
        $productsdesending = Product::where('status', 'Active')->orderBy('id', 'desc')->paginate(20);
        return view('frontend.all-page.product.allProduct', compact('products','productsassending', 'productsdesending'));
    }


    public function ownLuxaurofilter(Request $request)
    {
        if($request->ownluxauro == 'min'){
            $products = Product::where('status', 'Active')->orderBy('product_price', 'asc')->paginate(10);
        }elseif($request->ownluxauro == 'max'){
            $products = Product::where('status', 'Active')->orderBy('product_price', 'desc')->paginate(10);
        }else{
            $products = Product::where('status', 'Active')->paginate(10);
        }
        $html = view('frontend.all-page.product.productFilter', compact('products'))->render();
        return $html;
    }
}
