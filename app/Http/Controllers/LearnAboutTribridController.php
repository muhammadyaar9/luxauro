<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearnAboutGoldevine;

class LearnAboutTribridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutcount = LearnAboutGoldevine::where('type', 'Tribrid')->count();
        $aboutUs = LearnAboutGoldevine::where('type', 'Tribrid')->first();
        return view("frontend.admin.abouttribrid.index", compact('aboutUs', 'aboutcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.abouttribrid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $about = new LearnAboutGoldevine();
        $about->title = $request->title;
        $about->learn_about_description = $request->learn_about_description;
        $about->type = 'Tribrid';
        $about->save();
        return redirect()->route('learn-about-tribrid.index')->with('success', 'About Us Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutUs = LearnAboutGoldevine::find($id)->delete();
        return redirect()->route('learn-about-tribrid.index')->with('success', 'About Us Deleted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUs = LearnAboutGoldevine::find($id);
        return view('frontend.admin.abouttribrid.edit', compact('aboutUs'));
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
        $about =  LearnAboutGoldevine::find($id);
        $about->title = $request->title;
        $about->learn_about_description = $request->learn_about_description;
        $about->type = 'Tribrid';
        $about->update();
        return redirect()->route('learn-about-tribrid.index')->with('success', 'About Us Updated Successfully');
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
