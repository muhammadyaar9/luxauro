<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\HomeSlider;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = HomeSlider::all();
        return view('frontend.admin.homeSlider.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.homeSlider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedBanner = $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);
        $banner = new HomeSlider();
        $banner->title = $request->title;
        $banner->status = 'Pending';
        if($request->hasFile('image')){
            $path = asset('storage/'.$request->file('image')->store('images'));
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('home-slider.index')->with('success','Banner Created Successfully');
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
                $banner = HomeSlider::find($id);
                $banner->status = 'Active';
                $banner->save();
                return redirect()->route('home-slider.index')->with('success','Banner Activated Successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $banner = HomeSlider::find($id)->delete();
                return redirect()->route('home-slider.index')->with('success','Banner Deactivated Successfully');
    }
}
