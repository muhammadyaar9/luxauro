<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Vendor\City;
use App\Models\Vendor\State;
use Illuminate\Http\Request;
use App\Models\MerchantDetail;
use App\Models\Vendor\Country;
use App\Models\Admin\DeliveryOption;
use App\Models\MerchantApplication;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MerchantController extends Controller
{
    public function merchantAccountFirstStep()
    {

        // if (auth()->user()->role == 'Merchant' && auth()->user()->status == 'Active') {
            $countries = Country::all();
            $states = State::all();
            $cities = City::all();
            $merchant_detail = MerchantDetail::where('user_id', auth()->user()->id)->first();
            $delivery_options = DeliveryOption::all();
            // return $delivery_options;
            return view('frontend.all-page.merchant_account', compact('merchant_detail', 'states', 'cities', 'countries', 'delivery_options'));
        // } else {
        //     return redirect()->back()->with('error', 'Application is under review');
        // }
    }
    public function merchantAccountSecondStep(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'business_name' => 'required',
            'business_address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zip_code' => 'required',
            'business_email' => 'required',
            'business_website' => 'required',
            'phone_number' => 'required',
            'ein' => 'required',
            'bank_account_number' => 'required',
            'credit_card_number' => 'required',
            'description_about_us' => 'required',
            'business_run' => 'required',
            'delivery_id' => 'required',
            'team_memeber_name' => 'required',
            'business_logo' => 'required',
            'store_header' => 'required',
            'team_memeber_image' => 'required',
            'open_store'=> 'required',
            'ssn_tin' => 'required',

        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput()->with('error', 'Please fill up all the fields');
        } else {

            $already_exist = MerchantApplication::where('user_id', auth()->user()->id)->count();
            if ($already_exist > 0) {
                return redirect()->back()->with('error', 'You have already applied for merchant account');
            } else {
                $merchant = new MerchantApplication();
                $merchant->business_name = $request->business_name;
                $merchant->business_address = $request->business_address;
                $merchant->country_id = $request->country_id;
                $merchant->state_id = $request->state_id;
                $merchant->city_id = $request->city_id;
                $merchant->zip_code = $request->zip_code;
                $merchant->business_email = $request->business_email;
                $merchant->business_website = $request->business_website;
                $merchant->phone_number = $request->phone_number;
                $merchant->ein = $request->ein;
                $merchant->bank_account_number = $request->bank_account_number;
                $merchant->credit_card_number = $request->credit_card_number;
                $merchant->description_about_us = $request->description_about_us;
                $merchant->business_run = $request->business_run;
                $merchant->delivery_id = $request->delivery_id;
                $merchant->social_media_link = json_encode($request->social_media_link);
                $merchant->owner_name = $request->owner_name;
                $merchant->owner_introduce = $request->owner_introduce;
                $merchant->team_memeber_name = $request->team_memeber_name;
                $merchant->history = $request->history;
                $merchant->ethic = $request->ethic;
                $merchant->philosophy = $request->philosophy;
                $merchant->status = 'Pending';
                $merchant->user_id = auth()->user()->id;
                $merchant->ssn_tin = $request->ssn_tin;
                $merchant->open_store = $request->open_store;

                if ($request->hasFile('business_logo')) {
                    $path = asset('storage/' . $request->file('business_logo')->store('public/merchant_logo'));
                    $merchant->business_logo = $path;
                }
                if ($request->hasFile('store_header')) {
                    $path = asset('storage/' . $request->file('store_header')->store('public/merchant_header'));
                    $merchant->store_header = $path;
                }
                if ($request->hasFile('team_memeber_image')) {
                    $path = asset('storage/' . $request->file('team_memeber_image')->store('public/merchant_header'));
                    $merchant->team_memeber_image = $path;
                }

                if ($request->hasFile('owner_image')) {
                    $path = asset('storage/' . $request->file('owner_image')->store('public/merchant_header'));
                    $merchant->owner_image = $path;
                }
                $merchant->save();
                return redirect()->back()->with('success', 'Your application has been submitted successfully');
            }
        }
    }





    public function saveMerchantAccount(Request $request)
    {
        $merchant = $request->session()->get('merchant');
        if ($request->owner_upload_image != null) {
            $arr = explode('.', $request->owner_upload_image);
            $upload = Upload::create([
                'file_original_name' => null, 'file_name' => $request->owner_upload_image, 'user_id' => $merchant->id, 'extension' => $arr[1],
                'type' => isset($type[$arr[1]]) ?  $type[$arr[1]] : "others", 'file_size' => 0
            ]);
            $merchant->owner_upload_image = $upload->id;
            $merchant->save();
        }
        if ($request->team_upload_image != null) {
            $arr = explode('.', $request->team_upload_image);
            $upload = Upload::create([
                'file_original_name' => null, 'file_name' => $request->team_upload_image, 'user_id' => $merchant->id, 'extension' => $arr[1],
                'type' => isset($type[$arr[1]]) ?  $type[$arr[1]] : "others", 'file_size' => 0
            ]);
            $merchant->update(['team_upload_image' => $upload->id]);
        }

        $merchant->update([
            "business_detail" => $request->business_detail,
            "business_type_id" => "2",
            "delivery_id" => implode(',', $request->delivery_id),
            "social_media_link" => $request->social_media_link,
            "owner_name" => $request->owner_name,
            "introduce_owner" => $request->introduce_owner,
            "team_owner_name" => $request->team_owner_name,
            "history" => $request->history,
            "ethic" => $request->ethic,
            "philosophy" => $request->philosophy,
        ]);
        Session::flash('message', 'Record Added Successfully!');
        return redirect()->route('merchant_account_first_step');
    }
}
