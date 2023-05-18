<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\MerchantApplication;
use Illuminate\Support\Facades\Validator;

class SuitsController extends Controller
{
    public function index()
    {
        $suits = MerchantApplication::all();
        return view('frontend.all-page.suits.index', compact('suits'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $merchant =  MerchantApplication::find($request->application_id);
        isset($request->business_name) ? $merchant->business_name = $request->business_name : '';
        isset($request->business_address) ? $merchant->business_address = $request->business_address : '';
        isset($request->country_id) ? $merchant->country_id = $request->country_id : '';
        isset($request->state_id) ? $merchant->state_id = $request->state_id : '';
        isset($request->city_id) ? $merchant->city_id = $request->city_id : '';
        isset($request->zip_code) ? $merchant->zip_code = $request->zip_code : '';
        isset($request->business_email) ? $merchant->business_email = $request->business_email : '';
        isset($request->business_website) ? $merchant->business_website = $request->business_website : '';
        isset($request->phone_number) ? $merchant->phone_number = $request->phone_number : '';
        isset($request->ein) ? $merchant->ein = $request->ein : '';
        isset($request->bank_account_number) ? $merchant->bank_account_number = $request->bank_account_number : '';
        isset($request->credit_card_number) ? $merchant->credit_card_number = $request->credit_card_number : '';
        isset($request->description_about_us) ? $merchant->description_about_us = $request->description_about_us : '';
        isset($request->business_run) ? $merchant->business_run = $request->business_run : '';
        isset($request->delivery_id) ? $merchant->delivery_id = $request->delivery_id : '';
        isset($request->team_memeber_name) ? $merchant->team_memeber_name = $request->team_memeber_name : '';
        isset($request->business_logo) ? $merchant->business_logo = $request->business_logo : '';
        isset($request->store_header) ? $merchant->store_header = $request->store_header : '';
        isset($request->team_memeber_image) ? $merchant->team_memeber_image = $request->team_memeber_image : '';
        isset($request->social_media_link) ? $merchant->social_media_link = json_encode($request->social_media_link) : '';
        isset($request->owner_name) ? $merchant->owner_name = $request->owner_name : '';
        isset($request->owner_introduce) ? $merchant->owner_introduce = $request->owner_introduce : '';
        isset($request->history) ? $merchant->history = $request->history : '';
        isset($request->ethic) ? $merchant->ethic = $request->ethic : '';
        isset($request->philosophy) ? $merchant->philosophy = $request->philosophy : '';
        $merchant->status = 'Pending';
        $merchant->user_id = auth()->user()->id;
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
        $merchant->update();
        return redirect()->back()->with('success', 'Your application has been Updated successfully');
        // if ($request->hasFile('owner_image')) {
        //     foreach ($request->owner_image as $file) {
        //         if ($file) {
        //             $path = asset('storage/' . $file->store('public/merchant_owner'));
        //             $owner_images[] = $path;
        //         }
        //     }
        //     $merchant->owner_image = json_encode($owner_images);
        // }
        // if ($request->hasFile('team_memeber_image')) {
        //     $team_memeber_image = [];
        //     foreach ($request->team_memeber_image as $key => $value) {
        //         $path = asset('storage/' . $request->file('team_memeber_image')[$key]->store('public/merchant_team_member'));
        //         array_push($team_memeber_image, $path);
        //     }
        //     $merchant->team_memeber_image = json_encode($team_memeber_image);
        // }

    }

    public function suitsProducts($id)
    {
        
        $suits = MerchantApplication::find($id);
        $featured = Product::where('user_id', $suits->user_id)->where('status','Active')->where('product_status_type','Featured')->paginate(12);
        $productsassending = Product::where('user_id', $suits->user_id)->where('status','Active')->orderBy('id', 'asc')->paginate(10);
        $productsdesending = Product::where('user_id', $suits->user_id)->where('status','Active')->orderBy('id', 'desc')->paginate(10);
        $allSuits = MerchantApplication::where('status','Active')->paginate(12);
        return view('frontend.all-page.suits.suits_detail', compact('suits','featured','productsassending','productsdesending','allSuits'));
    }

    public function suitsSuitsDetail($id)
    {   
        $suits = MerchantApplication::find($id);
        $featured = Product::where('user_id', $suits->user_id)->where('status','Active')->where('product_status_type','Featured')->paginate(12);
        $productsassending = Product::where('user_id', $suits->user_id)->where('status','Active')->orderBy('id', 'asc')->paginate(10);
        $productsdesending = Product::where('user_id', $suits->user_id)->where('status','Active')->orderBy('id', 'desc')->paginate(10);
        $allSuits = MerchantApplication::where('status','Active')->paginate(12);
        return view('frontend.all-page.suits.suits_detail', compact('suits','featured','productsassending','productsdesending','allSuits'));

    }
}
