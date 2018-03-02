<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;
use DB;

class CheckoutController extends Controller {

    public function customerLogin() {
        return view('frontEnd.checkout.checkoutLoginContent');
    }

    public function customerRegistration() {
        return view('frontEnd.checkout.checkoutRegistrationContent');
    }

    public function customercheckoutRegistration(Request $request) {
        
         $this->validate($request,[
           'firstName'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3',
           'lastName'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3',
           'emailAddress'=>'required|email|unique:customers',
           'password'=>'required|min:6|',
           'confirm_password'=>'required|same:password',
           'captcha' => 'required|captcha',  
        ]);
         
         
        $checkoutCustomer = new Customer();
        $checkoutCustomer->firstName = $request->firstName;
        $checkoutCustomer->lastName = $request->lastName;
        $checkoutCustomer->emailAddress = $request->emailAddress;
        $checkoutCustomer->password = bcrypt($request->password);
        $checkoutCustomer->save();
        // $customerId = $customer->id;
        // Session::put('customerId', $customerId);
        return redirect('/checkoutLogin');
    }

    public function customercheckoutLogin(Request $request){
       $this->validate($request,[
           'cuemailAddress'=>'required|email',
           'cupassword'=>'required',  
        ]);

        $customerlogin = new Customer();
        $customerlogin->emailAddress = $request->cuemailAddress;
        $customerlogin->password = md5($request->cupassword);

        $login = DB::table('customers')->where('emailAddress', '=', $customerlogin->emailAddress)
                                        ->where('password', '=', $customerlogin->password)
                                        ->count();

        if ($login ==1){
            $data = DB::table('customers')->where('emailAddress', '=', $customerlogin->emailAddress)
                                       ->first();
          Session::put('customerId', $data->id);
            Session::put('emailAddress',  $data->firstName.$data->lastName);
             return redirect('/checkout/shipping');
        }
        else{
             return redirect('/checkoutLogin')->with('alert', 'Login Failed!');
        }
        
    }

    
    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shippingContent', ['customerById' => $customerById]);
    }

    public function saveShippingInfo(Request $request) {
        $this->validate($request,[
           'fullName'=>'required|string|max:255',
           'address'=>'required|string|max:255',
           'emailAddress'=>'required|string|email|max:255',
           'phoneNumber'=>'required|string|max:255',
           'districtName'=>'required|string|max:255',
 
        ]);

        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {
        return view('frontEnd.checkout.paymentContent');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->paymentType;
        if ($paymentType == 'cashOnDelivery') {
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');
            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            $orderDetail = new OrderDetail();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
            }
            return redirect('/checkout/my-home');

        } else if ($paymentType == 'bkash') {

            return 'Under construction bkash payment type. please use cash on delivary';

        } else if ($paymentType == 'paypal') {

            return 'Under construction paypal payment type. please use cash on delivary';
        }
    }

    public function customerHome() {
        return view('frontEnd.customer.customerHome');
    }

}
