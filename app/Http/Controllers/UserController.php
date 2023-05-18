<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\AboutUs;
use App\Models\Charter;
use App\Models\ContactUs;
use App\Models\Vendor\City;
use App\Models\Vendor\State;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Vendor\Country;
use App\Models\MerchantApplication;
use App\Models\Admin\DeliveryOption;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Product as AdminProduct;

class UserController extends Controller
{
    public function index(Request $request)
    {
        Session::put('url.intended', url()->current());
        $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->limit(15)->get();
        $ownluxauros = Product::with('user',)->where('status', 'Active')->limit(15)->get();
        $nationalshops = MerchantApplication::where('status', 'Active')->limit(15)->get();
        $search = $request->input('search');
        $categories = Category::where('title', 'LIKE', '%' . $search . '%')->get();
        if (count($categories) <= 0) {
            $categories = Category::when($search, function ($query, $search) {
                $query->whereHas('relatedProducts', function ($query) use ($search) {
                    $query->where('product_name', 'LIKE', '%' . $search . '%');
                });
            })
                ->with(['relatedProducts' => function ($query) use ($search) {
                    $query->where('product_name', 'like', '%' . $search . '%');
                }])
                ->get();
        }
        $locallaxaro = AdminProduct::with('categories', 'productType', 'deliveryOption', 'user')->where('status', 'Active')->orderby('id', 'desc')->limit(15)->get();
        $goldevines = Project::with('projectBenefits')->where('status', 'Active')->orderBy('id', 'desc')->limit(15)->get();
        $luxauro_charters = Charter::orderBy('id', 'desc')->limit(15)->get();
        return view('frontend.all-page.products', compact('categories', 'goldevines', 'locallaxaro', 'luxauro_charters', 'ownluxauros', 'nationalshops', 'luxauroLibrarys'));
    }
    public function appendProducts(Request $request)
    {
        $cat_id = substr($request->price_filter, -1);
        $orderby = substr($request->price_filter, 0, -1);
        $categories = Category::where('id', $cat_id)->first();
        $cat = Category::where('id', $cat_id)->first();
        $products = $cat->products()->where('status', 'Active')->orderBy('product_price', $orderby)->get();

        $html = view('frontend.all-page.append_products', ['products' => $products])->render();
        return $html;
    }
    public function appendLocalLuxauro(Request $request)
    {
        $orderby = substr($request->products, 0, -1);
        $products = AdminProduct::orderBy('product_price', $orderby)->limit(6)->get();
        $html = view('frontend.all-page.append_products', ['products' => $products])->render();
        return $html;
    }
    public function appendCategories(Request $request)
    {
        $categories = Category::orderBy('title', $request->category_filter)->get();
        $html = view('frontend.all-page.append_category', ['categories' => $categories])->render();
        return $html;
    }
    public function productDetail(Request $request)
    {
        $product_detail  = AdminProduct::where('id', $request->id)->first();
        return view('frontend.product_detail', compact('product_detail'));
    }
    public function save_profile_detail(Request $request)
    {
        $userId = isset($request->user_id) ? $request->user_id : auth()->user()->id;
        $user = User::where('id', auth()->user()->id)->first();
        User::where('id', $userId)->update([
            "email" => $request->email,
            "zip_code" => $request->zip_code,
        ]);
        if (isset($request->user_profile_image)) {
            $user_profile_image =  asset('storage/' . $request->user_profile_image->store('public/user_profile_image'));
        } else {
            $user_profile_image =  $user->userDetails()->first()->user_profile_image;
        }
        if (isset($request->course_certification_document)) {
            $course_certification_document =  asset('storage/' . $request->course_certification_document->store('public/course_certification_document'));
        } else {
            $course_certification_document =  $user->userDetails()->first()->course_certification_document;
        }
        $user->userDetails()->updateOrCreate([
            "name" => $request->name,
            "about_me" => $request->about_me,
            "phone" => $request->phone,
            "address" => $request->address,
            "city_id" => $request->city_id,
            "date_of_birth" => $request->date_of_birth,
            "state_id" => $request->state_id,
            "country_id" => $request->country_id,
            "language" => $request->language,
            "description" => $request->description,
            "portfolio_name" => $request->portfolio_name,
            "portfolio_link" => $request->portfolio_link,
            "user_profile_image" => $user_profile_image,
        ]);
        $user->userEducations()->updateOrCreate([
            "college_name" => $request->college_name,
            "degree" => $request->degree,
        ]);
        $user->userProfessions()->updateOrCreate([
            "business_name" => $request->business_name,
            "business_from" => $request->business_from,
            "business_to" => $request->business_to,
            "business_description" => $request->business_description,
        ]);
        $user->userCertificates()->updateOrCreate([
            "course_name" => $request->course_name,
            "course_certification_document" => $course_certification_document,
        ]);

        $user =   User::with(['userDetails' => function ($query) {
            return  $query->first();
        }, 'userEducations', 'userCertificates', 'userProfessions'])
            ->where('id', $userId)->first();
        Session::flash('message', 'Profile  Updated Successfully!');

        return back()->with(['user' =>  $user]);
    }



    public function merchantSuitManagement()
    {
        $suite = MerchantApplication::where('user_id', auth()->user()->id)->first();
        $delivory_options = DeliveryOption::all();
        if ($suite == null) {
            return redirect()->back()->with('error', 'Please fill the Merchant application form first');
        } else {
            return view('frontend.suite_management', compact('suite', 'delivory_options'));
        }
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

        $allprojects = Project::where('status', 'Active')->get();
        $newprojects = Project::where('status', 'Active')->orderBy('id', 'desc')->limit(15)->get();
        $trandingProjects = Project::where('status', 'Active')->orderBy('id', 'asc')->get();
        $nearlythereProjects = Project::where('status', 'Active')->inRandomOrder()->limit(15)->get();
        $featuredProjects = Project::where('status', 'Active')->where('project_category', 'Featured')->limit(15)->get();
        return view('frontend.goldevine.index', compact('allprojects', 'newprojects', 'trandingProjects', 'nearlythereProjects', 'featuredProjects'));
    }
    public function myProfile()
    {
        $projects = Project::with('user')->where('user_id', auth()->user()->id)->get();
        return view('frontend.all-page.goldevineprofile', compact('projects'));
    }

    public function myaccount()
    {
        $user =   User::with('userDetails', 'userEducations', 'userCertificates', 'userProfessions')
            ->where('id', auth()->user()->id)->first();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $userDetail = $user->userDetails()->latest()->first();
        $userEducations = $user->userEducations()->latest()->first();
        $userCertificates = $user->userCertificates()->latest()->first();
        $userProfessions = $user->userProfessions()->latest()->first();
        return view('frontend.all-page.my_profile', compact(
            'user',
            'states',
            'cities',
            'countries',
            'userDetail',
            'userEducations',
            'userCertificates',
            'userProfessions'
        ));
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
    public function faqs()
    {
        return view('frontend.faqs');
    }
    public function contactUs()
    {
        return view('frontend.contactUs.index');
    }

    public function contactUsStore(Request $requst)
    {
        // return $requst->collect();
        // return $requst->all();
        $validation = Validator::make($requst->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        } else {
            $contact = new ContactUs();
            $contact->first_name = $requst->first_name;
            $contact->last_name = $requst->last_name;
            $contact->email = $requst->email;
            $contact->phone_number = $requst->phone_number;
            $contact->message = $requst->message;
            $contact->contact_us_type = $requst->contact_us_type;
            $contact->save();
            return redirect()->back()->with('success', 'Your message has been sent successfully');
        }
    }


    public function adminContactUs()
    {
        $contacts = ContactUs::where('contact_us_type', 'Luxauro')->get();
        return view('frontend.admin.contact_us.index', compact('contacts'));
    }
    public function aboutUs()
    {
        $about = AboutUs::where('about_us_type','Luxauro')->first();
        return view('frontend.about_us', compact('about'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function searchFilter(Request $request)
    {
        $search = $request->search;
        if ($request->searchFilter == null) {
            $products = Product::where('product_name', 'like', '%' . $search . '%')->paginate(10);
            return view('frontend.all-page.search.index', compact('products'));
        } elseif ($request->searchFilter == 'max') {
            $products = Product::where('product_price', 'desc')->where('product_name', 'like', '%' . $search . '%')->paginate(10);
            return view('frontend.all-page.search.index', compact('products'));
        } else {
            $products = Product::where('product_price', 'asc')->where('product_name', 'like', '%' . $search . '%')->paginate(10);
            return view('frontend.all-page.search.index', compact('products'));
        }
    }

    public function allOwner(request $request)
    {

        $products = Product::where('status', 'Active')->paginate(20);
        $productsassending = Product::where('status', 'Active')->orderBy('id', 'asc')->paginate(20);
        $productsdesending = Product::where('status', 'Active')->orderBy('id', 'desc')->paginate(20);
        return view('frontend.all-page.product.ownproduct', compact('products', 'productsassending', 'productsdesending'));
    }

    public function forumPublishing(Request $request)
    {
        $products = AdminProduct::with('user', 'categories')->where('status', 'Active')->paginate(20);
        $productsassending = Product::where('status', 'Active')->orderBy('id', 'asc')->paginate(20);
        $productsdesending = Product::where('status', 'Active')->orderBy('id', 'desc')->paginate(20);
        return view('frontend.all-page.product.luxaurolibrary', compact('products', 'productsassending', 'productsdesending'));
    }

    public function luxaurostreet(Request $request)
    {
        $products = Product::where('status', 'Active')->paginate(20);
        $productsassending = Product::where('status', 'Active')->orderBy('id', 'asc')->paginate(20);
        $productsdesending = Product::where('status', 'Active')->orderBy('id', 'desc')->paginate(20);
        return view('frontend.all-page.product.luxaurostreet', compact('products', 'productsassending', 'productsdesending'));
    }

    public function forumFilter(Request $request)
    {

        if ($request->searchFilter == null) {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->paginate(20);
            $html = view('frontend.all-page.search.luxaurolibraryfilter', compact('luxauroLibrarys'))->render();
            return $html;
        } elseif ($request->searchFilter == 'min') {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->orderBy('product_price', 'desc')->paginate(20);
            $html = view('frontend.all-page.search.luxaurolibraryfilter', compact('luxauroLibrarys'))->render();
            return $html;
        } else {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->orderBy('product_price', 'asc')->paginate(20);
            $html = view('frontend.all-page.search.luxaurolibraryfilter', compact('luxauroLibrarys'))->render();
            return $html;
        }
    }

    public function streetFilter(Request $request)
    {
        if ($request->searchFilter == null) {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->paginate(20);
            $html = view('frontend.all-page.search.luxaurostreetfilter', compact('luxauroLibrarys'))->render();
            return $html;
        } elseif ($request->searchFilter == 'min') {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->orderBy('product_price', 'desc')->paginate(20);
            $html = view('frontend.all-page.search.luxaurostreetfilter', compact('luxauroLibrarys'))->render();
            return $html;
        } else {
            $luxauroLibrarys = AdminProduct::with('user', 'categories')->where('status', 'Active')->orderBy('product_price', 'asc')->paginate(20);
            $html = view('frontend.all-page.search.luxaurostreetfilter', compact('luxauroLibrarys'))->render();
            return $html;
        }
    }

    function nationalShop(Request $request)
    {
        // return $request->nationalShop;
        if ($request->nationalShop == 'AZ') {
            $nationalshops = MerchantApplication::orderBy('business_name', 'asc')->where('status', 'Active')->paginate(20);
        } else {
            $nationalshops = MerchantApplication::orderBy('business_name', 'desc')->where('status', 'Active')->paginate(20);
        }
        $html = view('frontend.all-page.search.nationalshopfilter', compact('nationalshops'))->render();
        return $html;
        // $applications = MerchantApplication::where('status', 'Active')->paginate(20);
        // return view('frontend.all-page.product.nationalshop', compact('products', 'productsassending', 'productsdesending'));
    }

    public function recommendedFilter(Request $request)
    {
        if ($request->filter == null) {
            $productsassending = Product::where('status', 'Active')->paginate(10);
            $html = view('frontend.all-page.search.recommendedfilter', compact('productsassending'))->render();
            return $html;
        } elseif ($request->filter == 'max') {
            $productsassending = Product::where('status', 'Active')->orderBy('product_price', 'desc')->paginate(10);
            $html = view('frontend.all-page.search.recommendedfilter', compact('productsassending'))->render();
            return $html;
        } else {
            $productsassending = Product::where('status', 'Active')->orderBy('product_price', 'asc')->paginate(10);
            $html = view('frontend.all-page.search.recommendedfilter', compact('productsassending'))->render();
            return $html;
        }
    }

    public function goldMetal()
    {
        return view('frontend.goldmetal.index');
    }
    public function admingoldevineContactUs()
    {
        $contacts = ContactUs::where('contact_us_type', 'Goldevine')->get();
        return view('frontend.admin.contact_us.index', compact('contacts'));
    }
}
