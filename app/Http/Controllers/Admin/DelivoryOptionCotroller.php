<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryOption;
use Illuminate\Support\Facades\Validator;

class DelivoryOptionCotroller extends Controller
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
        $delivoryOptions = DeliveryOption::all();
        return view('frontend.admin.delivoryoption.index',compact('delivoryOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.delivoryoption.create');
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
            'name' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Delivory Option not created.');
        }else{
            DeliveryOption::create([
                'name' => $request->name,
            ]);
            return redirect()->route('delivory-option.index')->with('success', 'Delivory Option created successfully.');
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

        $delivoryOption = DeliveryOption::find($id);
        return view('frontend.admin.delivoryoption.edit',compact('delivoryOption'));
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
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Delivory Option not created.');
        }else{

            $delivoryOption = DeliveryOption::find($id);
            $delivoryOption->name = $request->name;
            $delivoryOption->save();
            return redirect()->route('delivory-option.index')->with('success','Delivory Option Updated Successfully');
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
        $delivoryOption = DeliveryOption::find($id);
        $delivoryOption->delete();
        return redirect()->route('delivory-option.index')->with('success','Delivory Option Deleted Successfully');
    }
}
