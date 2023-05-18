<?php

namespace App\Http\Controllers\Vendor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use App\Models\Vendor\Country;
use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryOption;
use App\Models\Vendor\VendorAccount;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function accountRequest()
    {
        $allreadyexistdata = VendorAccount::where('user_id', auth()->user()->id)->first();
        $allreadyexist = VendorAccount::where('user_id', auth()->user()->id)->count();
        $countries = Country::all();
        $delivoryoptions = DeliveryOption::all();
        if ($allreadyexist > 0) {
            return view('frontend.vendor.account.index', compact('countries', 'delivoryoptions', 'allreadyexistdata'));
        } else {
            return view('frontend.vendor.account.index', compact('countries', 'delivoryoptions'));
        }
    }

    public function accountRequeststore(Request $request)
    {
        $allreadyexist = VendorAccount::where('user_id', auth()->user()->id)->count();
        if ($allreadyexist > 0) {
            return redirect()->back()->with('error', 'You have already applied for vendor account');
        }
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'business_logo' => 'required',
            'upload_your_store_header' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'business_website' => 'required',
            'business_phone' => 'required',
            'ein' => 'required',
            'bank_account_number' => 'required',
            'credit_card_number' => 'required',
            'description' => 'required',
            'kind_of_business' => 'required',
            'delivery_id' => 'required',

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Please fill up all the fields');
        } else {

            $vendoraccount = new VendorAccount();

            if ($request->hasFile('business_logo')) {
                $path = asset('storage/' . $request->file('business_logo')->store('vendor/business_logo'));
                $vendoraccount->business_logo = $path;
            }
            if ($request->hasFile('upload_your_store_header')) {
                $path = asset('storage/' . $request->file('upload_your_store_header')->store('vendor/upload_your_store_header'));
                $vendoraccount->upload_your_store_header = $path;
            }
            if ($request->hasFile('owner_image')) {
                $path = asset('storage/' . $request->file('owner_image')->store('vendor/owner_image'));
                $vendoraccount->owner_image = $path;
            }
            $vendoraccount->name = $request->name;
            $vendoraccount->country_id = $request->country_id;
            $vendoraccount->state_id = $request->state_id;
            $vendoraccount->city = $request->city;
            $vendoraccount->address = $request->address;
            $vendoraccount->email = $request->email;
            $vendoraccount->business_website = $request->business_website;
            $vendoraccount->business_phone = $request->business_phone;
            $vendoraccount->ein = $request->ein;
            $vendoraccount->bank_account_number = $request->bank_account_number;
            $vendoraccount->credit_card_number = $request->credit_card_number;
            $vendoraccount->description = $request->description;
            $vendoraccount->kind_of_business = $request->kind_of_business;
            $vendoraccount->delivery_id = $request->delivery_id;
            $vendoraccount->social_media_link = $request->social_media_link;
            $vendoraccount->owner_name = $request->owner_name;
            $vendoraccount->history = $request->history;
            $vendoraccount->philosophy = $request->philosophy;
            $vendoraccount->ethic = $request->ethic;
            $vendoraccount->user_id = Auth()->user()->id;
            $vendoraccount->save();
            if($vendoraccount->save()){
                $user = User::find(auth()->user()->id);
                $user->status = 'Pending';
                $user->save();
                return redirect()->back()->with('success', 'Your request has been sent successfully');
            }
        }
    }

    public function accountRequestupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'business_website' => 'required',
            'business_phone' => 'required',
            'ein' => 'required',
            'bank_account_number' => 'required',
            'credit_card_number' => 'required',
            'description' => 'required',
            'kind_of_business' => 'required',
            'delivery_id' => 'required',

        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Please fill up all the fields');
        } else {
            $vendoraccount =  VendorAccount::find($request->id);
            if ($request->hasFile('business_logo')) {
                $path = asset('storage/' . $request->file('business_logo')->store('vendor/business_logo'));
                $vendoraccount->business_logo = $path;
            }
            if ($request->hasFile('upload_your_store_header')) {
                $path = asset('storage/' . $request->file('upload_your_store_header')->store('vendor/upload_your_store_header'));
                $vendoraccount->upload_your_store_header = $path;
            }
            if ($request->hasFile('owner_image')) {
                $path = asset('storage/' . $request->file('owner_image')->store('vendor/owner_image'));
                $vendoraccount->owner_image = $path;
            }
            $vendoraccount->name = $request->name;
            $vendoraccount->country_id = $request->country_id;
            $vendoraccount->state_id = $request->state_id;
            $vendoraccount->city = $request->city;
            $vendoraccount->address = $request->address;
            $vendoraccount->email = $request->email;
            $vendoraccount->business_website = $request->business_website;
            $vendoraccount->business_phone = $request->business_phone;
            $vendoraccount->ein = $request->ein;
            $vendoraccount->bank_account_number = $request->bank_account_number;
            $vendoraccount->credit_card_number = $request->credit_card_number;
            $vendoraccount->description = $request->description;
            $vendoraccount->kind_of_business = $request->kind_of_business;
            $vendoraccount->delivery_id = $request->delivery_id;
            $vendoraccount->social_media_link = $request->social_media_link;
            $vendoraccount->owner_name = $request->owner_name;
            $vendoraccount->history = $request->history;
            $vendoraccount->philosophy = $request->philosophy;
            $vendoraccount->ethic = $request->ethic;
            $vendoraccount->user_id = Auth()->user()->id;
            $vendoraccount->update();
            if($vendoraccount->update()){
                $user = User::find(Auth()->user()->id);
                $user->status = 'Pending';
                $user->update();
                return redirect()->back()->with('success', 'Your request has been sent successfully');
            }
        }

    }
}
