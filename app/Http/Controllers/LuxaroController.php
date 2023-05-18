<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\State;

use App\Models\Upload;
use App\Models\Country;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\DeliveryOption;

class LuxaroController extends Controller
{
    // public function __construct()
    // {
    //      $this->middleware(['auth']);
    // }
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::with('category', 'productType', 'delivoryOption', 'shippingType', 'user')->where('status','Active')->limit(15)->get();
        return view('frontend.all-page.products', compact('products','categories'));
    }
    public function productDetail(Request $request)
    {
        $product_detail  = Product::where('id', $request->id)->first();
        return view('frontend.product_detail', compact('product_detail'));
    }
    public function save_profile_detail(Request $request)
    {
        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            "mp4"=>"video",
            "mpg"=>"video",
            "mpeg"=>"video",
            "webm"=>"video",
            "ogg"=>"video",
            "avi"=>"video",
            "mov"=>"video",
            "flv"=>"video",
            "swf"=>"video",
            "mkv"=>"video",
            "wmv"=>"video",
            "wma"=>"audio",
            "aac"=>"audio",
            "wav"=>"audio",
            "mp3"=>"audio",
            "zip"=>"archive",
            "rar"=>"archive",
            "7z"=>"archive",
            "doc"=>"document",
            "txt"=>"document",
            "docx"=>"document",
            "pdf"=>"document",
            "csv"=>"document",
            "xml"=>"document",
            "ods"=>"document",
            "xlr"=>"document",
            "xls"=>"document",
            "xlsx"=>"document"
        );
        $userId = isset($request->user_id) ? $request->user_id : auth()->user()->id;
     $user = User::where('id',$userId)->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "about_me" => $request->about_me,
            "address" => $request->address,
            "city" => $request->city_id,
            "date_of_birth" => $request->date_of_birth,
            "state" => $request->state_id,
            "country" => $request->country_id,
            "language" => $request->language,
            "book_from" => $request->book_from,
            "book_to" => $request->book_to,
            "description" => $request->description,
            "college_name" => $request->college_name,
            "degree" => $request->degree,
            "course_name" => $request->course_name,
            "portfolio_name" => $request->portfolio_name,
            "portfolio_link" => $request->portfolio_link,
         ]);
         $user =   User::where('id',$userId)->first();
         if($request->hasFile('user_profile_image')){
            $upload = new Upload;
            $extension = strtolower($request->file('user_profile_image')->getClientOriginalExtension());
            if(isset($type[$extension])){
                $upload->file_original_name = null;
                $arr = explode('.', $request->file('user_profile_image')->getClientOriginalName());
                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }
                $path = $request->file('user_profile_image')->store('uploads/all', 'local');
                $size = $request->file('user_profile_image')->getSize();
                $upload->extension = $extension;
                $upload->file_name = $path;
                $upload->user_id = 1;
                $upload->type = $type[$upload->extension];
                $upload->file_size = $size;
                $upload->save();
                $user->update(["user_profile_image" => $upload->id]);
                // print_r($upload);
                // dd($user);
            }
        }
        if($request->hasFile('course_certification_document')){
            $upload = new Upload;
            $extension = strtolower($request->file('course_certification_document')->getClientOriginalExtension());

            if(isset($type[$extension])){
                $upload->file_original_name = null;
                $arr = explode('.', $request->file('course_certification_document')->getClientOriginalName());
                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }

                $path = $request->file('course_certification_document')->store('uploads/all', 'local');
                $size = $request->file('course_certification_document')->getSize();

                // Return MIME type ala mimetype extension
                $finfo = finfo_open(FILEINFO_MIME_TYPE);

                $upload->extension = $extension;
                $upload->file_name = $path;
                $upload->user_id = 2;
                $upload->type = $type[$upload->extension];
                $upload->file_size = $size;
                $upload->save();
                $user->update(["course_certification_document" => $upload->id]);
            }
        }

         return back()->with(['user' =>  $user]);
    }


    public function merchantSuitManagement()
    {
        return view('frontend.suite_management');
    }

    public function merchantPaymentManagement()
    {
        return view('frontend.payment_management');
    }
    public function merchantSuits()
    {
        return view('frontend.merchant_suits');
    }
    public function charterDetail()
    {
        return view('frontend.charter_detail');
    }
    public function createAccount()
    {
        return view('frontend.create_account');
    }
    public function chats()
    {
        return view('frontend.chats');
    }
    public function goldEvine()
    {
        return view('frontend.goldevine_projects');
    }
    public function myProfile()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('frontend.all-page.my_profile',compact('user','states','cities','countries'));
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function faqs()
    {
        return view('frontend.faqs');
    }
    public function contactUs()
    {
        return view('frontend.contact_us');
    }
    public function aboutUs()
    {
        return view('frontend.about_us');
    }

    public function login()
    {
        return view('frontend.login');
    }
}
