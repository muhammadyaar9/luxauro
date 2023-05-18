<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ProductType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductTypeCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = ProductType::all();
        return view('frontend.admin.producttype.index', compact('producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.producttype.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Type not created.');
        }else{
            ProductType::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('product-type.index')->with('success', 'Product Type created successfully.');
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

        $producttypes = ProductType::find($id);
        return view('frontend.admin.producttype.edit', compact('producttypes'));
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
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Product Type not updated.');
        }else{
            $producttypes = ProductType::find($id);
            $producttypes->title = $request->title;
            $producttypes->description = $request->description;
            $producttypes->save();
            return redirect()->route('product-type.index')->with('success', 'Product Type updated successfully.');
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

        ProductType::find($id)->delete();
        return redirect()->route('product-type.index')->with('success', 'Product Type deleted successfully.');
    }
}
