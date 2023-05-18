<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor\VendorAccount;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }


    public function index()
    {
        return view('frontend.admin.dashboard.index');
    }

    public function allVendor()
    {
        // $pendingVendors = User::with('vendor')->where('role','Merchant')->whereIn('status',['Pending','Active','Suspended'])->get();
        $pendingVendors = User::with('merchant')->get();
        // return dd($pendingVendors);
        return view('frontend.admin.vendors.index' , compact('pendingVendors'));
    }

    public function adminsuspendedVendor($id)
    {
        $vendor = User::find($id);
        $vendor->status = 'Active';
        $vendor->save();
        return redirect()->back()->with('success','Vendor Active Successfully');
    }

    public function adminactiveVendor($id)
    {
        $vendor = User::find($id);
        $vendor->status = 'Suspended';
        $vendor->save();
        return redirect()->back()->with('success','Vendor Suspended Successfully');
    }

    public function vendorshow(Request $request)
    {
        // return $id;
        $vendor = VendorAccount::with('country','state','delivery')->find($request->id);
        return response()->json($vendor);
    }





}
