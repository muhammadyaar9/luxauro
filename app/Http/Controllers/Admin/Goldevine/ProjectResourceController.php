<?php

namespace App\Http\Controllers\Admin\Goldevine;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Goldevine\FounderDetail;
use App\Models\Admin\Goldevine\ProjectBenefit;


class ProjectResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user')->get();
        return view('frontend.admin.goldevine.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.admin.goldevine.project.create');
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
            'title' => 'required',
            'short_description_project' => 'required',
            'project_category' => 'required',
            'feature_image_project' => 'required',
            'gallery_image' => 'required',
            'video_link' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'minimum_pledge_amount' => 'required|numeric',
            'maximum_pledge_amount' => 'required|numeric',
            'project_funding_goal' => 'required',
            'recommended_pledge_amount' => 'required|numeric',
            'location' => 'required',
            'description' => 'required',
            'benefit_name' => 'required',
            'price.*' => 'required|array',
            'price.*' => 'sometimes|required|numeric',
            'benefit_msrp.*' => 'required|array',
            'benefit_msrp.*' => 'required|numeric',
            'feature_image' => 'required',
            'estimated_delivery_date' => 'required',
            'quantity' => 'required',
            'short_description' => 'required',
            'tags' => 'required',
            'business_address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ein' => 'required',
            'deposit_bank_account' => 'required',
            'credit_cart_number' => 'required',
            'founder_state' => 'required',
            'project_end_method' => 'required',

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Please fill up all the fields');
        } else {
            $project = new Project();
            if ($request->hasFile('feature_image_project')) {
                $path = asset('storage/' . $request->feature_image_project->store('project'));
                $project->feature_image = $path;
            }
            if ($request->hasFile('gallery_image')) {
                $images = [];
                foreach ($request->gallery_image as $image) {
                    $path = asset('storage/' . $image->store('project'));
                    array_push($images, $path);
                }
                $project->gallery_image = json_encode($images);
            }
            $project->title = $request->title;
            $project->short_description = $request->short_description_project;
            $project->project_category = $request->project_category;
            $project->video_link = $request->video_link;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->minimum_pledge_amount = $request->minimum_pledge_amount;
            $project->maximum_pledge_amount = $request->maximum_pledge_amount;
            $project->project_funding_goal = $request->project_funding_goal;
            $project->recommended_pledge_amount = $request->recommended_pledge_amount;
            $project->location = $request->location;
            $project->description = $request->description;
            $project->project_end_method = $request->project_end_method;
            $project->user_id = auth()->user()->id;
            $project->save();
            $tags = explode(",", $request->tags);
            $project->tag($tags);
            if ($project->save()) {
                foreach ($request->benefit_name as $key => $value) {
                    $benefit = new ProjectBenefit();
                    if ($request->hasFile('feature_image')) {
                        $path = asset('storage/' . $request->feature_image[$key]->store('project'));
                        $benefit->feature_image = $path;
                    }
                    $benefit->benefit_name = $request->benefit_name[$key];
                    $benefit->price = $request->price[$key];
                    $benefit->benefit_msrp = $request->benefit_msrp[$key];
                    $benefit->estimated_delivery_date = $request->estimated_delivery_date[$key];
                    $benefit->quantity = $request->quantity[$key];
                    $benefit->short_description = $request->short_description[$key];
                    $benefit->project_id = $project->id;
                    $benefit->user_id = auth()->user()->id;
                    $benefit->save();
                }
                if ($project->save()) {
                    $projectbusiness = new FounderDetail();
                    $projectbusiness->project_id = $project->id;
                    $projectbusiness->business_address = $request->business_address;
                    $projectbusiness->city = $request->city;
                    $projectbusiness->founder_state = $request->founder_state;
                    $projectbusiness->zip_code = $request->zip_code;
                    $projectbusiness->email = $request->email;
                    $projectbusiness->website = $request->website;
                    $projectbusiness->phone = $request->phone;
                    $projectbusiness->ein = $request->ein;
                    $projectbusiness->bank_account = $request->deposit_bank_account;
                    $projectbusiness->cart_number = $request->credit_cart_number;
                    $projectbusiness->user_id = auth()->user()->id;
                    $projectbusiness->save();
                }
                if ($projectbusiness->save()) {
                    return redirect()->route('admin-goudevine-project.index')->with('success', 'Project created successfully');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong');
                }
            }
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
        $project = Project::with('projectBenefits')->find($id);
        // dd($project->tags);
        return view('frontend.admin.goldevine.project.edit', compact('project'));
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


        $project = Project::find($id);
        if ($request->hasFile('feature_image_project')) {
            $path = asset('storage/' . $request->feature_image_project->store('project'));
            $project->feature_image = $path;
        }
        if ($request->hasFile('gallery_image')) {
            $images = [];
            foreach ($request->gallery_image as $image) {
                $path = asset('storage/' . $image->store('project'));
                array_push($images, $path);
            }
            $project->gallery_image = json_encode($images);
        }
        $project->title = $request->title;
        $project->short_description = $request->short_description_project;
        $project->project_category = $request->project_category;
        $project->video_link = $request->video_link;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->minimum_pledge_amount = $request->minimum_pledge_amount;
        $project->maximum_pledge_amount = $request->maximum_pledge_amount;
        $project->project_funding_goal = $request->project_funding_goal;
        $project->recommended_pledge_amount = $request->recommended_pledge_amount;
        $project->location = $request->location;
        $project->description = $request->description;
        $project->project_end_method = $request->project_end_method;
        $project->user_id = auth()->user()->id;
        $project->save();
        $tags = explode(",", $request->tags);
        $project->retag($tags);
        if ($project->save()) {
            foreach ($request->benefit_name as $key => $value) {
                if ($request->benefit_id[$key] == null || $request->benefit_id[$key] == 0 || $request->benefit_id[$key] == '') {
                    $benefit = new ProjectBenefit();
                } else {
                    $benefit = ProjectBenefit::find($request->benefit_id[$key]);
                }
                if ($request->hasFile('feature_image' . $key)) {
                    $path = asset('storage/' . $request->feature_image[$key]->store('project'));
                    $benefit->feature_image = $path;
                }
                $benefit->benefit_name = $request->benefit_name[$key];
                $benefit->price = $request->price[$key];
                $benefit->benefit_msrp = $request->benefit_msrp[$key];
                $benefit->estimated_delivery_date = $request->estimated_delivery_date[$key];
                $benefit->quantity = $request->quantity[$key];
                $benefit->short_description = $request->short_description[$key];
                $benefit->project_id = $project->id;
                $benefit->user_id = auth()->user()->id;
                $benefit->save();
            }
            $projectbusiness = FounderDetail::find($request->founder_id);
            $projectbusiness->project_id = $project->id;
            $projectbusiness->business_address = $request->business_address;
            $projectbusiness->city = $request->city;
            $projectbusiness->founder_state = $request->founder_state;
            $projectbusiness->zip_code = $request->zip_code;
            $projectbusiness->email = $request->email;
            $projectbusiness->website = $request->website;
            $projectbusiness->phone = $request->phone;
            $projectbusiness->ein = $request->ein;
            $projectbusiness->bank_account = $request->deposit_bank_account;
            $projectbusiness->cart_number = $request->credit_cart_number;
            $projectbusiness->user_id = auth()->user()->id;
            $projectbusiness->save();

            if ($projectbusiness->save()) {
                return redirect()->route('admin-goudevine-project.index')->with('success', 'Project created successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
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
        $project = Project::find($id);
        $project->projectBenefits->each->delete();
        $project->delete();
        return redirect()->route('admin-goudevine-project.index')->with('success', 'Project Deleted Successfully');
    }
}
