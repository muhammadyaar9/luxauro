<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ShippingType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShippingTypeCotroller extends Controller
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

        $shippingtypes = ShippingType::all();
        return view('frontend.admin.shippingtype.index', compact('shippingtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.shippingtype.create');
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
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Shipping Type not created.');
        }else{
            ShippingType::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('shipping-type.index')->with('success', 'Shipping Type created successfully.');
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
        $shippingtype = ShippingType::find($id);
        return view('frontend.admin.shippingtype.edit', compact('shippingtype'));
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
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Shipping Type not updated.');
        }else{
            $shippingtype = ShippingType::find($id);
            $shippingtype->title = $request->title;
            $shippingtype->description = $request->description;
            $shippingtype->save();
            return redirect()->route('shipping-type.index')->with('success', 'Shipping Type updated successfully.');
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
        ShippingType::whereId($id)->delete();
        return redirect()->route('shipping-type.index')->with('success', 'Shipping Type deleted successfully.');
    }
}
