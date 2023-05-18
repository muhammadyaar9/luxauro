<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\LearnAboutGoldevine;
use Illuminate\Support\Facades\Validator;

class LearnAboutGoldevineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::orderBy('id', 'desc')->where('about_us_type', 'Tribrid')->first();
        $checkaboutUs = AboutUs::orderBy('id', 'desc')->where('about_us_type', 'Tribrid')->count();
        return view('frontend.admin.goldevineabout.index', compact('aboutUs', 'checkaboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('frontend.admin.goldevineabout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make(
            $request->all(),
            [
                "first_title" => "required",
                "second_title" => "required",
                "first_description" => "required",
                "image" => "required",
                "second_description" => "required",
            ]
        );
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        } else {
            $aboutUs = new AboutUs();
            $aboutUs->first_title = $request->first_title;
            $aboutUs->second_title = $request->second_title;
            $aboutUs->first_description = $request->first_description;
            $aboutUs->second_description = $request->second_description;
            $aboutUs->about_us_type = $request->about_us_type;
            if ($request->hasFile('image')) {
                $path = asset('storage/' . $request->file('image')->store('public/aboutUs'));
                $aboutUs->image = $path;
            }
            $aboutUs->save();
            return redirect()->route('learn-about-gold.index')->with('success', 'About Us Added Successfully');
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
        AboutUs::find($id)->delete();
        return redirect()->route('learn-about-gold.index')->with('success', 'About Us Deleted Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editAboutUs = AboutUs::find($id);
        return view('frontend.admin.goldevineabout.edit', compact('editAboutUs'));
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
        $aboutUs =  AboutUs::find($id);
        $aboutUs->first_title = $request->first_title;
        $aboutUs->second_title = $request->second_title;
        $aboutUs->first_description = $request->first_description;
        $aboutUs->second_description = $request->second_description;
        $aboutUs->about_us_type = $request->about_us_type;
        if ($request->hasFile('image')) {
            $path = asset('storage/' . $request->file('image')->store('public/aboutUs'));
            $aboutUs->image = $path;
        }
        $aboutUs->update();
        return redirect()->route('learn-about-gold.index')->with('success', 'About Us Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
