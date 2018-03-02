<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use Cart;
use DB;
use Mail;
use App\Mail\NewCustomerWelcome;
use Auth;
class CustomerController extends Controller
{
  // private static function get_random() {

  //   $type =rand(0,2);

  //   switch($type) {
  //     case 2:
  //       $random = chr(rand(65,90));
  //     break;
  //     case 1:
  //       $random = chr(rand(97,122));
  //     break;
  //     default:
  //       $random = rand(0,9);
  //   }

  //   return $random;
  // }

  // public static function generate_code($length) {
  
  //   $code = null;
  //   for($i = 0; $i < $length; $i++) {
  //     $code .= self::get_random();
  //   }

    
  //   return $code;
  // }
    public function customerRegistration(Request $request) {
        
         $this->validate($request,[
           'firstName'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3',
           'lastName'=>'required|regex:/^[a-zA-Z]+$/u|max:255|min:3',
           'emailAddress'=>'required|email|unique:customers',
           'password'=>'required|min:6|',
           'conpassword'=>'required|same:password',
           'captcha' => 'required|captcha',
        ]);
        
        $customer = new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->emailAddress = $request->emailAddress;
        $customer->password = md5($request->password);
        $customer->save();

       Mail::to($request->emailAddress)->send(new NewCustomerWelcome());

        return redirect('/')->with('message', 'Registration Successfull');
    }

    public function customerLogin(Request $request){

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
          Session::put('emailAddress',  $data->firstName.$data->lastName);
          Session::put('customerId', $data->id);
             return redirect('/')->with('alert-success', 'Login Successfull');
        }
        else{
             return redirect('/')->with('alert', 'Login Failed!');
        }
        
    }

    public function customerLogout(Request $request){
        $request->Session()->flush();

        return redirect('/')->with('alert', 'Successfully LogOut!');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }

     public function viewCustomer($id){
      $customerById = DB::table('customers')
            ->select('customers.*','id', 'firstName', 'lastName','emailAddress')
            ->where('customers.id',$id)
            ->first();
        return view('admin.customer.viewCustomer',['customer'=>$customerById]);
     }
     public function manageCustomer(){
        $customers = Customer::all();
        return view('admin.customer.manageCustomer',['customers'=>$customers]);
    }
}
