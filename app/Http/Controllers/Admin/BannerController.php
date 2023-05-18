<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('frontend.admin.banner.index' , compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->created_by = auth()->user()->id;
        if($request->hasFile('image')){
            $path = asset('storage/'.$request->file('image')->store('admin/banner'));
            $banner->image = $path;
        }
        $banner->save();
        return redirect()->route('banner.index')->with('success' , 'Banner Created Successfully');
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
        $banner = Banner::find($id);
        if($banner->status == 'active')
        {
            $banner->status = 'Suspend';
            $banner->update();
        }
        else
        {
            $banner->status = 'active';
            $banner->update();
        }
        return redirect()->route('banner.index')->with('success' , 'Banner Status Updated Successfully');
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
        Banner::find($id)->delete();
        return redirect()->route('banner.index')->with('success' , 'Banner Deleted Successfully');
    }
}
