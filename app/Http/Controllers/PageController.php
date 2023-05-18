<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\LearnAboutGoldevine;

class PageController extends Controller
{
    public function sellerpolicy()
    {
        $page =  Page::where('type', 'seller_policy_page')->first();
        return view("frontend.policies.sellerpolicy", compact('page'));
    }

    public function returnpolicy()
    {
        $page =  Page::where('type', 'return_policy_page')->first();
        return view("frontend.policies.returnpolicy", compact('page'));
    }

    public function supportpolicy()
    {
        $page =  Page::where('type', 'support_policy_page')->first();
        return view("frontend.policies.supportpolicy", compact('page'));
    }

    public function terms()
    {
        $page =  Page::where('type', 'terms_conditions_page')->first();
        return view("frontend.all-page.policies.terms", compact('page'));
    }

    public function privacypolicy()
    {
        $page =  Page::where('type', 'privacy_policy_page')->first();
        return view("frontend.all-page.policies.privacy", compact('page'));
    }

    public function luxaurocontactUs()
    {
        return view("frontend.contactUs.luxauroContactUs");
    }

    public function goldevineAboutUs()
    {
        $about =  AboutUs::where('about_us_type', 'Goldevine')->first();
        return view("frontend.goldevineaboutus",compact('about'));
    }

    public function tribridContactUs()
    {
        $ribrid = LearnAboutGoldevine::where('type', 'Tribrid')->first();
        return view("frontend.goldevine.learnabout.aboutgold",compact('ribrid'));
    }

    public function learnaboutgoldevine()
    {
        $about =  AboutUs::where('about_us_type', 'Tribrid')->first();
        return view("frontend.goldevine.learnabout.index",compact('about'));

    }

    public function goldevineRule()
    {
        $ribrid = LearnAboutGoldevine::where('type', 'Rule')->first();
        return view("frontend.goldevine.learnabout.aboutgold",compact('ribrid'));

    }
}
