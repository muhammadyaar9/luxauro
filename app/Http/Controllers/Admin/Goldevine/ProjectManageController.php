<?php

namespace App\Http\Controllers\Admin\Goldevine;

use Carbon\Carbon;
use App\Models\Admin\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Vendor\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SelectProjectBenefits;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Goldevine\FounderDetail;
use App\Models\Admin\Goldevine\GoldevineOrder;
use App\Models\Admin\Goldevine\ProjectBenefit;

class ProjectManageController extends Controller
{
    public function projectDetail($id, $slug)
    {
        $project = Project::with('projectBenefits')->where('id', $id)->where('status', 'Active')->first();
        $randdomprojects = Project::where('id', '!=', $id)->where('status', 'Active')->inRandomOrder()->limit(15)->get();
        return view('frontend.all-page.goldevine.projectdetail', compact('project', 'randdomprojects'));
    }

    public function projectcheckout($id)
    {
        $projectBenefit = ProjectBenefit::with('project', 'user')->find($id);
        return view('frontend.all-page.cart.checkout', compact('projectBenefit'));
    }

    public function projectcheckoutstore(Request $request)
    {
        $Project = Project::find($request->project_id);
        $findinggoal = $Project->project_funding_goal;
        $total = totalamout($request->project_id);
        $newtotal = $total + $request->total;
        if ($findinggoal < $newtotal) {
            return redirect()->back()->with('error', 'You can not order more than project funding goal');
        } else {
            $goldevineorder = new GoldevineOrder();
            $goldevineorder->benefit_id = $request->benefit_id;
            $goldevineorder->user_id = $request->user_id;
            $goldevineorder->total_price = $request->total;
            $goldevineorder->quantity = $request->quantity;
            $goldevineorder->project_id = $request->project_id;
            $goldevineorder->order_status = 'Pending';
            $goldevineorder->payment_status = 'Pending';
            $goldevineorder->payment_method = 'Cash On Delivery';
            $goldevineorder->user_id = auth()->user()->id;
            $goldevineorder->save();
            return redirect()->route('home')->with('success', 'Order Placed Successfully');
        }
    }

    public function projectsearch(Request $request)
    {
        if ($request->searchFilter == 'min' ) {
            $search = $request->search;
            $projectsearches = Project::orderBy('project_funding_goal', 'asc')->where('title', 'LIKE', "%{$search}%")->where('status', 'Active')->paginate(15);
            return view('frontend.all-page.search.goldevinesearch', compact('projectsearches'));
        } elseif ($request->searchFilter == 'max' ) {
            $search = $request->search;
            $projectsearches = Project::orderBy('project_funding_goal', 'DESC')->where('title', 'LIKE', "%{$search}%")->where('status', 'Active')->paginate(15);
            return view('frontend.all-page.search.goldevinesearch', compact('projectsearches'));
        } else {

            $search = $request->search;
            $projectsearches = Project::where('title', 'LIKE', "%{$search}%")->where('status', 'Active')->paginate(15);
            return view('frontend.all-page.search.goldevinesearch', compact('projectsearches'));
        }
    }

    public function create()
    {
        $countries = Country::all();
        return view('frontend.all-page.project.create', compact('countries'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'shoert_description_project' => 'required',
            'tags' => 'required',
            'feature_image_project' => 'required',
            'gallery_image' => 'required',
            'video_link' => 'required',
            'project_category' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'minimum_amount' => 'required',
            'maximum_amount' => 'required',
            'funding_goal' => 'required',
            'recommended_amount' => 'required',
            'country' => 'required',
            'location' => 'required',
            'project_end_method' => 'required',
            'benefit_title' => 'required',
            'benefit_price' => 'required',
            'benefit_msrp' => 'required',
            'feature_image' => 'required',
            'short_description' => 'required',
            'delivery_date' => 'required',
            'quantity' => 'required',
            'business_address' => 'required',
            'city' => 'required',

            'founder_state' => 'required',
            'zip_code' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ein' => 'required',
            'bank_account' => 'required',
            'cart_number' => 'required',
            'term_conditions' => 'required',

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Please Fill Up All The Field');
        } else {
            $project = new Project();
            if ($request->hasFile('feature_image_project')) {
                $path = asset('storage/' . $request->feature_image_project->store('project/feature_image_project'));
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
            $project->description = $request->description;
            $project->short_description = $request->shoert_description_project;
            $project->video_link = $request->video_link;
            $project->project_category = $request->project_category;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->minimum_pledge_amount = $request->minimum_amount;
            $project->maximum_pledge_amount = $request->maximum_amount;
            $project->project_funding_goal = $request->funding_goal;
            $project->recommended_pledge_amount = $request->recommended_amount;
            $project->country = $request->country;
            $project->location = $request->location;
            $project->project_end_method = $request->project_end_method;
            $project->status = 'Pending';
            $project->user_id = auth()->user()->id;
            $project->save();
            $tags = explode(",", $request->tags);
            $project->tag($tags);
            if ($project->save()) {
                foreach ($request->benefit_title as $key => $value) {
                    $projectbenefit = new ProjectBenefit();
                    $projectbenefit->project_id = $project->id;
                    $projectbenefit->benefit_name = $request->benefit_title[$key];
                    $projectbenefit->price = $request->benefit_price[$key];
                    $projectbenefit->benefit_msrp = $request->benefit_msrp[$key];
                    if ($request->hasFile('feature_image')) {
                        $path = asset('storage/' . $request->feature_image[$key]->store('project/feature_image'));
                        $projectbenefit->feature_image = $path;
                    }
                    $projectbenefit->short_description = $request->short_description[$key];
                    $projectbenefit->estimated_delivery_date = $request->delivery_date[$key];
                    $projectbenefit->quantity = $request->quantity[$key];
                    $projectbenefit->user_id = auth()->user()->id;
                    $projectbenefit->save();
                }
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
                $projectbusiness->bank_account = $request->bank_account;
                $projectbusiness->cart_number = $request->cart_number;
                $projectbusiness->user_id = auth()->user()->id;
                $projectbusiness->save();
            }
            return redirect()->back()->with('success', 'Project Created Successfully');
        }
    }

    public function allProject()
    {
        $projects = Project::with('user')->where('user_id', auth()->user()->id)->get();
        return view('frontend.all-page.project.index', compact('projects'));
    }

    public function edit($id)
    {
        $project = Project::with('projectBenefits', 'FounderDetail')->find($id);
        $countries = Country::all();
        return view('frontend.all-page.project.edit', compact('countries', 'project'));
    }

    public function update(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'shoert_description_project' => 'required',
            'tags' => 'required',
            'video_link' => 'required',
            'project_category' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'minimum_amount' => 'required',
            'maximum_amount' => 'required',
            'funding_goal' => 'required',
            'recommended_amount' => 'required',
            'country' => 'required',
            'location' => 'required',
            'project_end_method' => 'required',

            'benefit_title' => 'required',
            'benefit_price' => 'required',
            'benefit_msrp' => 'required',
            'short_description' => 'required',
            'delivery_date' => 'required',
            'quantity' => 'required',
            'feature_image' => 'required',

            'business_address' => 'required',
            'city' => 'required',
            'founder_state' => 'required',
            'zip_code' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ein' => 'required',
            'bank_account' => 'required',
            'cart_number' => 'required',
            'term_conditions' => 'required',


        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Please Fill Up All The Field');
        } else {
            $projectbenefits = ProjectBenefit::where('project_id', $request->project_id)->get();
            foreach ($projectbenefits as $projectbenefit) {
                $found = false;
                foreach ($request->benefit_id as $benefit_id) {
                    if ($projectbenefit->id == $benefit_id) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    ProjectBenefit::find($projectbenefit->id)->delete();
                }
            }


            $project = Project::find($request->project_id);
            if ($request->hasFile('feature_image_project')) {
                $path = asset('storage/' . $request->feature_image_project->store('project/feature_image_project'));
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
            $project->description = $request->description;
            $project->short_description = $request->shoert_description_project;
            $project->video_link = $request->video_link;
            $project->project_category = $request->project_category;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->minimum_pledge_amount = $request->minimum_amount;
            $project->maximum_pledge_amount = $request->maximum_amount;
            $project->project_funding_goal = $request->funding_goal;
            $project->recommended_pledge_amount = $request->recommended_amount;
            $project->country = $request->country;
            $project->location = $request->location;
            $project->project_end_method = $request->project_end_method;
            $project->status = 'Pending';
            $project->user_id = auth()->user()->id;
            $project->save();
            $tags = explode(",", $request->tags);
            $project->retag($tags);
            if ($project->save()) {
                foreach ($request->benefit_title as $key => $value) {

                    if ($request->benefit_id[$key] == null || $request->benefit_id[$key] == '') {
                        $projectbenefit = new ProjectBenefit();
                    } else {
                        $projectbenefit = ProjectBenefit::find($request->benefit_id[$key]);
                    }
                    //  echo $projectbenefit . $key;





                    if ($request->hasFile('feature_image')) {
                        $path = asset('storage/' . $request->feature_image[$key]->store('project/feature_image'));
                        $projectbenefit->feature_image = $path;
                    }

                    $projectbenefit->project_id = $project->id;
                    $projectbenefit->benefit_name = $request->benefit_title[$key];
                    $projectbenefit->price = $request->benefit_price[$key];
                    $projectbenefit->benefit_msrp = $request->benefit_msrp[$key];
                    $projectbenefit->short_description = $request->short_description[$key];
                    $projectbenefit->estimated_delivery_date = $request->delivery_date[$key];
                    $projectbenefit->quantity = $request->quantity[$key];
                    $projectbenefit->user_id = auth()->user()->id;
                    $projectbenefit->save();
                }
                if ($project->save()) {
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
                    $projectbusiness->bank_account = $request->bank_account;
                    $projectbusiness->cart_number = $request->cart_number;
                    $projectbusiness->user_id = auth()->user()->id;
                    $projectbusiness->save();
                }
            }
        }
        return redirect()->route('allprojects')->with('success', 'Project Updated Successfully');
    }

    public function addToFavirate(Request $request)
    {

        $project = Project::find($request->project_id);
        if ($project->add_to_favirate == auth()->user()->id) {
            return response()->json(['error' => 'Project Already Added To Favorite']);
        } else {

            $project->add_to_favirate = auth()->user()->id;
            $project->save();
            return response()->json(['success' => 'Project Added To Favorite']);
        }
    }

    public function favirateRemove(Request $request)
    {
        $checkfavirate = Project::where('add_to_favirate', auth()->user()->id)->where('id', $request->project_id)->count();
        if ($checkfavirate == 0) {
            return response()->json(['error' => 'Project Not Found In Favorite']);
        } else {

            $project = Project::find($request->project_id);
            $project->add_to_favirate = null;
            $project->save();
            return response()->json(['success' => 'Project Removed From Favorite']);
        }
    }


    public function filterGoldevine(Request $request)
    {
        if ($request->filter == "Raised(max)") {
            $data = '';
            $projects = Project::where('status', 'Active')->orderBy('project_funding_goal', 'DESC')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        } else {
            $projects = Project::where('status', 'Active')->orderBy('project_funding_goal', 'ASC')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        }
    }

    public function Goldevinetrending(Request $request)
    {
        if ($request->filter == "Raised(max)") {
            $projects = Project::where('status', 'Active')->orderBy('id', 'DESC')->orderBy('project_funding_goal', 'DESC')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        } else {
            $projects = Project::where('status', 'Active')->orderBy('project_funding_goal', 'asc')->orderBy('id', 'desc')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        }
    }

    public function goldevinebackeds(Request $request)
    {

        if ($request->filter == "Raised(max)") {
            $projects = Project::where('status', 'Active')->orderBy('id', 'DESC')->orderBy('project_funding_goal', 'DESC')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        } else {
            $projects = Project::where('status', 'Active')->orderBy('project_funding_goal', 'asc')->orderBy('id', 'desc')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        }
    }

    public function goldevinenearly(Request $request)
    {
        if ($request->filter == "Raised(max)") {
            $projects = Project::where('status', 'Active')->orderBy('id', 'DESC')->orderBy('project_funding_goal', 'DESC')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        } else {
            $projects = Project::where('status', 'Active')->orderBy('project_funding_goal', 'asc')->orderBy('id', 'desc')->limit(8)->get();
            $data = [];
            foreach ($projects as $project) {
                $url = route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]);
                $asset = asset('images/default.png');
                $title = Str::words($project->title, 2, '...');
                $total_amount = GoldevineOrder::where('project_id', $project->id)->sum('total_price');
                $donations = GoldevineOrder::where('project_id', $project->id)->count();
                $totalAmount = number_format($total_amount);
                $persentage = persentage($project->id);
                $donation = donation($project->id);
                $short_description = Str::words($project->short_description, 10, '...');
                $html = '<div> <a href="' . $url . '"> <div class=product-item> <div class=img-holder> <img src="' . $project->feature_image . '" onerror="this.src=' . $asset . '" class=img-fluid> </div> <div class=txt-holder> <strong class="title text-center d-block mb-2">' . $title . '</strong> <div class="progress rounded-0 mb-1"> <div class="progress-bar rounded-0" role=progressbar style=width:' . $persentage . '; aria-valuenow=75 aria-valuemin=0 aria-valuemax=100></div></div><div class="d-flex justify-content-between"> <span>$' . $totalAmount . ' Raised</span> <span>' . $persentage . '%</span> </div> <p class=mb-2>' . $donation . ' Donations</p> <p class=m-0>' . $short_description . '</p></div> </div></a></div>';
                array_push($data, $html);
            }
            return $data;
        }
    }

    public function goldevineNewest()
    {
        $newestprojects = Project::where('status', 'Active')->orderBy('id', 'DESC')->paginate(20);
        // return dd($newestprojects);
        return view('frontend.goldevine.project.category.newest', compact('newestprojects'));
    }

    public function goldevineTrendings()
    {
        $trendingprojects = Project::where('status', 'Active')->orderBy('id', 'DESC')->paginate(20);
        return view('frontend.goldevine.project.category.trending', compact('trendingprojects'));
    }

    public function goldevinemostbacked()
    {
        $goldevinemostbacked = Project::where('status', 'Active')->orderBy('id', 'DESC')->paginate(20);
        return view('frontend.goldevine.project.category.mostbacked', compact('goldevinemostbacked'));
    }

    public function goldevinenearlys()
    {
        $goldevinenearly = Project::where('status', 'Active')->orderBy('id', 'DESC')->paginate(20);
        return view('frontend.goldevine.project.category.nearly', compact('goldevinenearly'));
    }

    public function projectAddToCart(Request $request)
    {
        $checkalrady = SelectProjectBenefits::where('benefit_id', $request->id)->where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($checkalrady) {
            return response()->json(['error' => 'Already added to cart!']);
        }
        $selectBenefits = new SelectProjectBenefits();
        $selectBenefits->benefit_id = $request->id;
        $selectBenefits->user_id = auth()->user()->id;
        $selectBenefits->save();
        $goldenvine = SelectProjectBenefits::with('project_benefit')->where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $totalgoldenvine = 0;
        if ($selectBenefits->save()) {
            $benefit = ProjectBenefit::with('project')->where('id', $request->id)->first();
            foreach ($goldenvine as $totalgoldenvines) {
                $totalgoldenvine = $totalgoldenvine + $totalgoldenvines->project_benefit->price * $totalgoldenvines->project_benefit->quantity;
            }
        }
        $cartorders = 0;
        $cartorders = Cart::with('product')
            ->where(function ($query) {
                $query
                    ->where('status', 'pending')
                    ->where('user_id', Auth::id())
                    ->where('temp_id', '!=', null)
                    ->orWhere(function ($query) {
                        $query->where('status', 'pending')->where('temp_id', session()->get('temp_id'));
                    });
            })
            ->count();
        $cartorders = $cartorders + projectaddTocartCount();

        return response()->json(['success' => 'Added to cart successfully!', 'benefit' => $benefit, 'totalgoldenvine' => $totalgoldenvine, 'goldenvine' => $goldenvine, 'cartorders' => $cartorders]);
    }

    public function removeGoldevineproject(Request $request)
    {
        $benefit = SelectProjectBenefits::find($request->id)->delete();
        $goldenvine = SelectProjectBenefits::with('project_benefit')->where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        $totalgoldenvine = 0;
        if ($benefit) {
            foreach ($goldenvine as $totalgoldenvines) {
                $totalgoldenvine = $totalgoldenvine + $totalgoldenvines->project_benefit->price * $totalgoldenvines->project_benefit->quantity;
            }
        }
        return response()->json(['success' => 'Removed successfully!', 'totalgoldenvine' => $totalgoldenvine, 'goldenvine' => $goldenvine]);
    }
}
