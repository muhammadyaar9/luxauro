<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor\City;
use App\Models\Vendor\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function vendorDashboard()
    {
        return view('frontend.vendor.dashboard.index');
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
