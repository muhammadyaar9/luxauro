<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\DeliveryOption;
use App\Models\Admin\ProductType;
use App\Models\Admin\ShippingType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\ProductSpecificationGeneral;
use App\Models\Admin\DeliveryOption as AdminDeliveryOption;

class ProductCotroller extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories', 'productType', 'deliveryOption', 'shippingType', 'user')->get();
        return view('frontend.admin.product.index', compact('products'));
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
        $delivoryOption = AdminDeliveryOption::all();
        $shippingType = ShippingType::all();
        return view('frontend.admin.product.create', compact('categories', 'productType', 'delivoryOption', 'shippingType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();

        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'modal_number' => 'required',
            'sku' => 'required',
            'productId' => 'required',
            'multiple_image' => 'required',
            'msrf' => 'required',
            'quantity' => 'required',
            'serial_number' => 'required',
            'shipping_charge' => 'required|numeric',
            'category_id' => 'required',
            'delivery_option_id' => 'required',
            'product_image' => 'required',


        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Added Failed');
        } else {
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->sku = $request->sku;
            $product->productId = $request->productId;
            $product->modal_number = $request->modal_number;
            $product->upc = $request->upc;
            $product->is_auction = $request->is_auction;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $product->msrf = $request->msrf;
            $product->quantity = $request->quantity;
            $product->serial_number = $request->serial_number;
            $product->product_type = $request->product_type_id;
            $product->shipping_charge = $request->shipping_charge;
            $product->status = "Pending";
            $product->user_id = auth()->user()->id;
            if ($request->hasFile('product_image')) {
                $path = asset('storage/' . $request->product_image->store('product'));
                $product->image = $path;
            }

            if($request->hasFile('multiple_image')){
                $images = $request->file('multiple_image');
                $imageArray = array();
                foreach($images as $image){
                    $path = asset('storage/' . $image->store('product'));
                    $imageArray[] = $path;
                }
                $product->multiple_image = json_encode($imageArray);
            }
            $product->save();
            $tags = explode(",", $request->tags);
            $product->tag($tags);
            $product->categories()->sync($request->category_id);
            $product->deliveryOption()->sync($request->delivery_option_id);
            $product->shippingType()->sync($request->shipping_type_id);
            if($product->save()){
                $spacification = new ProductSpecificationGeneral();
                $spacification->product_id = $product->id;
                $spacification->model_series_name = $request->model_series_name;
                $spacification->model_number = $request->model_number;
                $spacification->primary_meterial = $request->primary_meterial;
                $spacification->primary_meterial_subType = $request->primary_meterial_subType;
                $spacification->delivery_condition = $request->delivery_condition;
                $spacification->suitable_for = $request->suitable_for;
                $spacification->compatible_laptop_size = $request->compatible_laptop_size;
                $spacification->foldable = $request->foldable;
                $spacification->adjustable_height = $request->adjustable_height;
                $spacification->width = $request->width;
                $spacification->height = $request->height;
                $spacification->depth = $request->depth;
                $spacification->weight = $request->weight;
                if($request->hasFile('first_image'))
                {
                    $path = asset('storage/' . $request->first_image->store('product'));
                    $spacification->first_image = $path;
                }
                if($request->hasFile('second_image'))
                {
                    $path = asset('storage/' . $request->second_image->store('product'));
                    $spacification->first_image = $path;
                }
                if($request->hasFile('third_image'))
                {
                    $path = asset('storage/' . $request->third_image->store('product'));
                    $spacification->first_image = $path;
                }

                $spacification->first_description = $request->first_description;
                $spacification->second_description = $request->second_description;
                $spacification->third_description = $request->third_description;
                $spacification->save();

            }
            if (isset($request->vendorSide))
                return redirect()->route('product_management')->with('success', 'Product Added Successfully');
            else
                return redirect()->route('product.index')->with('success', 'Product Added Successfully');
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
        $product = Product::with('categories', 'productType', 'deliveryOption', 'shippingType', 'user' , 'spacificationgeneral')->find($id);
        $categories = Category::all();
        $productType = ProductType::all();
        $delivoryOption = AdminDeliveryOption::all();
        $shippingType = ShippingType::all();

        // $tags = $product->tagNames();
        // return $tags;
        // $product->tags = implode(",", $tags);
        // return $product->tags;
        // echo $product->tags;
        return view('frontend.admin.product.edit', compact('product', 'categories', 'productType', 'delivoryOption', 'shippingType'));
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
        // return $request->all();
        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'sku' => 'required',
            'productId' => 'required',
            'quantity' => 'required',
            'serial_number' => 'required',
            'shipping_charge' => 'required|numeric',

        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Added Failed');
        } else {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        // $product->category_id = $request->product_category_id;
        // $product->product_type_id = $request->product_type_id;
        // $product->delivory_option_id = $request->delivory_option_id;
        // $product->shipping_type_id = $request->shipping_type_id;
        $product->shipping_charge = $request->shipping_charge;
        $product->product_price = $request->product_price;
        $product->msrf = $request->msrf;
        $product->quantity = $request->quantity;
        $product->serial_number = $request->serial_number;
        $product->status = $request->status;
        $product->user_id = $request->user_id;
        if ($request->hasFile('product_image')) {
            $path = asset('storage/' . $request->product_image->store('product'));
            $product->image = $path;
        }
        if($request->hasFile('multiple_image')){
            $images = $request->file('multiple_image');
            $imageArray = array();
            foreach($images as $image){
                $path = asset('storage/' . $image->store('product'));
                $imageArray[] = $path;
            }
            $product->multiple_image = json_encode($imageArray);
        }
        $product->save();
        $tags = explode(",", $request->tags);
        $product->retag($tags);
        $tags = explode(",", $request->tags);
        $product->categories()->sync($request->category_id);
        $product->deliveryOption()->sync($request->delivery_option_id);
        // $product->productType()->sync($request->product_type_id);
        $product->shippingType()->sync($request->shipping_type_id);
        if($product->save()){
            $spacification =  ProductSpecificationGeneral::where('product_id', $id)->first();
            $spacification->product_id = $product->id;
            $spacification->model_series_name = $request->model_series_name;
            $spacification->model_number = $request->model_number;
            $spacification->primary_meterial = $request->primary_meterial;
            $spacification->primary_meterial_subType = $request->primary_meterial_subType;
            $spacification->delivery_condition = $request->delivery_condition;
            $spacification->suitable_for = $request->suitable_for;
            $spacification->compatible_laptop_size = $request->compatible_laptop_size;
            $spacification->foldable = $request->foldable;
            $spacification->adjustable_height = $request->adjustable_height;
            $spacification->width = $request->width;
            $spacification->height = $request->height;
            $spacification->depth = $request->depth;
            $spacification->weight = $request->weight;
            if($request->hasFile('first_image'))
            {
                $path = asset('storage/' . $request->first_image->store('product'));
                $spacification->first_image = $path;
            }
            if($request->hasFile('second_image'))
            {
                $path = asset('storage/' . $request->second_image->store('product'));
                $spacification->second_image = $path;
            }
            if($request->hasFile('third_image'))
            {
                $path = asset('storage/' . $request->third_image->store('product'));
                $spacification->third_image = $path;
            }

            $spacification->first_description = $request->first_description;
            $spacification->second_description = $request->second_description;
            $spacification->third_description = $request->third_description;
            $spacification->update();

        }


        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
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
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
