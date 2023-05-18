<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Charter;
use Illuminate\Http\Request;
use App\Models\CharterBooking;
use App\Models\Admin\DeliveryOption;
use Illuminate\Support\Facades\Validator;
use App\Models\CharterAvaliabiltyDateAndTime;
use App\Models\Admin\CharterSpecificationGeneral;

class CharterManagementController extends Controller
{
    public function charters()
    {
        return view('frontend.charters');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $charters = Charter::query()
            ->when($search, function ($query, $search) {
                return $query->where('charter_name', 'like', '%' . $search . '%');
            })
            ->paginate(5);
        return view('frontend.charters.all', compact('charters'));
    }
    public function charter_detail(Request $request)
    {
        $charter_detail = Charter::with('charterSpecificationGeneral')->where('id', $request->id)->first();
        $charters = Charter::where('id', '!=', $request->id)->get();
        return view('frontend.charters.detail', compact('charter_detail', 'charters'));
    }
    public function charter_management(Request $request)
    {
        $charters = Charter::with('charterAvaliabiltyDateAndTimes')->get();
        $delivery_options = DeliveryOption::all();
        return view('frontend.charters.charter_management', compact('charters', 'delivery_options'));
    }
    public function appendCharters(Request $request)
    {
        $charters = Charter::orderBy('rate', $request->charter)->get();
        $html = view('frontend.all-page.append_charters', ['charters' => $charters])->render();
        return $html;
    }


    public function charter_book(Request $request)
    {
        CharterBooking::create([
            "book_from" => $request->book_from,
            "book_to" => $request->book_to,
            "time_from" => $request->time_from,
            "time_to" => $request->time_to,
            "number_of_guest" => $request->number_of_guest,
            "created_at" =>  \Carbon\Carbon::now()->timestamp,
            "created_at" =>  \Carbon\Carbon::now()->timestamp,
        ]);
        return back()->with('success', 'Charter Booked Successfully');
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
            'charter_name' => 'required',
            'charter_type' => 'required',
            'rate' => 'required|numeric',
            'hr_select' => 'required',
            'description' => 'required',
            'date_of_avalability' => 'required',
            'start_time' => 'required',
            'tags' => 'required',
            'max_guests' => 'required',
            'delivery_id' => 'required',
            'thumbnail_img' => 'required',
            'charter_agreement' => 'required',
            'thumbnail_img' => 'required',
            'terms_condition' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Charter Added Failed');
        } else {
            $charter = new Charter;
            $charter->charter_name = $request->charter_name;
            $charter->charter_type = $request->charter_type;
            $charter->rate = $request->rate;
            $charter->hr_select = $request->hr_select;
            $charter->description = $request->description;
            $charter->max_guests = $request->max_guests;
            $charter->terms_condition = $request->terms_condition;
            $charter->user_id = auth()->user()->id;
            $charter->status = 'Active';
            if ($request->hasFile('thumbnail_img')) {
                $path = asset('storage/' . $request->file('thumbnail_img')->store('public/charter'));
                $charter->thumbnail_img = $path;
            }

            if ($request->hasFile('charter_agreement')) {
                $images = $request->file('charter_agreement');
                $imageArray = array();
                foreach ($images as $image) {
                    $path = asset('storage/' . $image->store('public/charter'));
                    $imageArray[] = $path;
                }
                $charter->charter_agreement = json_encode($imageArray);
            }
            $charter->save();
            $tags = explode(",", $request->tags);
            $charter->retag($tags);
            $charter->charterDeliveryOptions()->sync($request->delivery_id);
            foreach ($request->date_of_avalability as $key => $date) {
                $availability = new CharterAvaliabiltyDateAndTime();
                $availability->charter_id = $charter->id;
                $availability->date_of_avalability = $date;
                $availability->time_of_avalability = $request->start_time[$key];
                $availability->save();
            }
            $spacification =  new CharterSpecificationGeneral();
            $spacification->charter_id = $charter->id;
            $spacification->model_series_name = $request->model_series_name;
            $spacification->model_number = $request->model_number;
            $spacification->primary_meterial = $request->primary_meterial;
            $spacification->primary_meterial_subType = $request->primary_meterial_subType;
            $spacification->delivery_condition = $request->delivery_condition;
            $spacification->suitable_for = $request->suitable_for;
            $spacification->compatible_laptop_size = $request->compatible_laptop_size;
            $spacification->foldable = $request->foldable;
            $spacification->adjustable_height = $request->adjustable_height;
            $spacification->width = $request->width;
            $spacification->height = $request->height;
            $spacification->depth = $request->depth;
            $spacification->weight = $request->weight;
            if ($request->hasFile('first_image')) {
                $path = asset('storage/' . $request->first_image->store('product'));
                $spacification->first_image = $path;
            }
            if ($request->hasFile('second_image')) {
                $path = asset('storage/' . $request->second_image->store('product'));
                $spacification->second_image = $path;
            }
            if ($request->hasFile('third_image')) {
                $path = asset('storage/' . $request->third_image->store('product'));
                $spacification->third_image = $path;
            }
            $spacification->first_description = $request->first_description;
            $spacification->second_description = $request->second_description;
            $spacification->third_description = $request->third_description;
            $spacification->save();
            return redirect()->back()->with('success', 'Charter Added Successfully');
        }
    }


    public function appendarea(Request $request)
    {
        $charters = Charter::where('id', '!=', $request->id)->orderBy('rate', $request->charter)->get();
        $html = view('frontend.all-page.append_charters', ['charters' => $charters])->render();
        return $html;
    }
}
