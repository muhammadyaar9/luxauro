<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorControlController extends Controller
{
    public function register()
    {
        return view('frontend.vendor.auth.register');
    }
}
