<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Cart;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\CartOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GoldevineOrderDenefit;
use App\Models\SelectProjectBenefits;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Queue\Console\RetryCommand;
use App\Models\Admin\Goldevine\GoldevineOrder;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $temp_id = session()->get('temp_id');
        $allcartorders = Cart::with('product')
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->where('user_id', Auth::id())
                    ->orWhere(function ($query) {
                        $query->where('status', 'pending')
                            ->where('temp_id', session()->get('temp_id'));
                    });
            })
            ->get();

            $goldenevines = SelectProjectBenefits::with('project_benefit')->where('user_id', Auth::id())->where('status', 'pending')->get();
        return view('frontend.all-page.cart.index', compact('allcartorders' , 'goldenevines'));
    }
    public function destroycheckout(Request $request)
    {

        $cart = Cart::find($request->destroy_id);
        $cart->delete();
        if (Auth::check()) {
            $total = Cart::where('user_id', Auth::user()->id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');
            $count = Cart::where('user_id', Auth::user()->id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
            return response()->json(['success' => 'Product Deleted From Cart Successfully.', 'total' => $total, 'count' => $count, 'status' => 'success']);
        } else {
            $temp_id = session()->get('temp_id');
            $total = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->sum('total_price');
            $count = Cart::where('temp_id', $temp_id)->where('status', 'Pending')->orwhere('temp_id', session()->get('temp_id'))->count();
            return response()->json(['success' => 'Product Deleted From Cart Successfully.', 'total' => $total, 'count' => $count, 'status' => 'success']);
        }
    }

    public function paymenttype(Request $request)
    {

        // return $request->all();

        // foreach ($request->cart_id as $cart_id){
        //     $carts = Cart::find($cart_id);
        //     session()->put('vendor_id', $carts->product->user_id);
        //     $firstTime = true;
        //     if($firstTime)
        //     {
        //         echo "first time";

        //         $firstTime = false;
        //     }else{
        //         if($carts->product->user_id !== session()->get('vendor_id') ){
        //             echo "same";

        //         }else{
        //             echo "not same";

        //         }
        //     }

        //     // dd($carts->product->user_id);
        // }
        // {{ dd(session()->forget('vendor_id')); }}


        if($request->luxaurosubtotal == 0){
            // return redirect()->back()->with('error', 'Please Select Product First');
        }else{
            $order = new Order();
        $order->payment_type = 'Cash On delivory';
        $order->payment_status = 'Pending';
        $order->status = 'Pending';
        $order->total_price = '0';
        $order->luxaurosub_total = $request->luxaurosubtotal;
        $order->shipping_charge = $request->shiping;
        $order->discount = $request->discount;
        $order->over_all_total = $request->overalltotal;
        $order->user_id = Auth::user()->id;
        $order->save();
        if ($order->save()) {
            foreach ($request->cart_id as $cart_id) {
                $carts = Cart::find($cart_id);
                $cartorder = new CartOrder();
                $cartorder->cart_id = $cart_id;
                $cartorder->order_id = $order->id;
                $cartorder->vendor_id = $carts->product->user_id;
                $cartorder->save();
            }
        }
        if ($order->save()) {
            foreach ($request->cart_id as $cart_id) {
                $cart = Cart::find($cart_id);
                $cart->status = 'Order Placed';
                $cart->save();
            }
            session()->forget('temp_id');
        }
        }
        $goldevineorder = new GoldevineOrder();
        $goldevineorder->user_id = Auth::user()->id;
        $goldevineorder->total_price = $request->goldevinetotals;
        $goldevineorder->order_status = 'Pending';
        $goldevineorder->payment_status = 'Pending';
        $goldevineorder->payment_method = 'Cash On Delivery';
        $goldevineorder->save();
        if(isset($request->benefit_id)){

            foreach ($request->benefit_id as $key => $cart_id) {
                $goldevineOrderDenefit = new GoldevineOrderDenefit();
                $goldevineOrderDenefit->goldevine_order_id = $goldevineorder->id;
                $goldevineOrderDenefit->select_project_benefits_id = $request->select_project_benefits_id[$key];
                $goldevineOrderDenefit->project_id = $request->project_id[$key];
                $goldevineOrderDenefit->benefit_id = $request->benefit_id[$key];
                $goldevineOrderDenefit->project_user_id = $request->project_user_id[$key];
                $goldevineOrderDenefit->quantity = $request->quantity[$key];
                $goldevineOrderDenefit->price = $request->quantity[$key] * $request->price[$key];
                $goldevineOrderDenefit->save();
            }
        }
        if(isset($request->select_project_benefits_id)){
            foreach ($request->select_project_benefits_id as $cart_id) {
                $cart = SelectProjectBenefits::find($cart_id);
                $cart->status = 'Order Placed';
                $cart->save();
            }
        }
        return redirect()->route('home')->with(['success' => 'Order Placed Successfully.']);
    }
}
