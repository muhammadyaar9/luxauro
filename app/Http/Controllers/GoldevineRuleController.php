<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearnAboutGoldevine;

class GoldevineRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutcount = LearnAboutGoldevine::where('type', 'Rule')->count();
        $aboutUs = LearnAboutGoldevine::where('type', 'Rule')->first();
        return view("frontend.admin.goldevinerule.index", compact('aboutUs', 'aboutcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view("frontend.admin.goldevinerule.create");
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
        $about->type = 'Rule';
        $about->save();

        return redirect()->route('goldevine-rule.index')->with('success', 'Goldevine Rule has been created successfully');
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
        return redirect()->route('goldevine-rule.index')->with('success', 'Goldevine Rule has been deleted successfully');
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
        return view("frontend.admin.goldevinerule.edit", compact('aboutUs'));
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
        $about->type = 'Rule';
        $about->update();
        return redirect()->route('goldevine-rule.index')->with('success', 'Goldevine Rule has been updated successfully');
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
