<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Login;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Rules\Captcha;
use App\SocialCustomers; 
use App\Customer;
use Auth;
use App\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite



class AdminController extends Controller
{
    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if( $authUser){
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('login_normal',true);
        Session::put('admin_id',$account_name->admin_id);
    }elseif($customer_new){
        $account_name = Login::where('admin_id',$authUser->user)->first();
        Session::put('admin_name',$account_name->admin_name);
        Session::put('login_normal',true);
        Session::put('admin_id',$account_name->admin_id);
    }
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }else{
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);
    
            $orang = Login::where('admin_email',$users->email)->first();
    
                if(!$orang){
                    $orang = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',
    
                        'admin_phone' => '',
                        'admin_status' => 1
                    ]);
                }
            $customer_new->login()->associate($orang);
            $customer_new->save();
            return $customer_new;
        }
   

    }

    public function login_customer_google(){
        config( ['services.google.redirect' => env('GOOGLE_CLIENT_URL')] );
        return Socialite::driver('google')->redirect();
    }
    public function callback_customer_google(){

        config( ['services.google.redirect' => env('GOOGLE_CLIENT_URL')] );

        $users = Socialite::driver('google')->stateless()->user(); 

        $authUser = $this->findOrCreateCustomer($users, 'google');

        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);

        }elseif($customer_new){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }

        return redirect('/login-checkout')->with('message', 'Đăng nhập bằng tài khoản google <span style="color:red">'.$account_name->customer_email.'</span> thành công');  
    }
    public function findOrCreateCustomer($users, $provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);

            $customer = Customer::where('customer_email',$users->email)->first();

            if(!$customer){

                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_picture' => $users->avatar,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }

            $customer_new->customer()->associate($customer);

            $customer_new->save();
            return $customer_new;
        }           

    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $cong = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',
                    

                ]);
            }
            $cong->login()->associate($orang);
            $cong->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    } 
    public function login_facebook_customer(){
        config( ['services.facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')] );
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook_customer(){
        config( ['services.facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')] );
        $provider = Socialite::driver('facebook')->user();

        $account = SocialCustomers::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();

        if($account!=NULL){

           $account_name = Customer::where('customer_id',$account->user)->first();
           Session::put('customer_id',$account_name->customer_id);
           Session::put('customer_name',$account_name->customer_name);

           return redirect('/login-checkout')->with('message', 'Đăng nhập bằng tài khoản facebook <span style="color:red">'.$account_name->customer_email.'</span> thành công');  

       }elseif($account==NULL){
           $customer_login = new SocialCustomers([
            'provider_user_id' => $provider->getId(),
            'provider_user_email' => $provider->getEmail(),
            'provider' => 'facebook'
            ]);

           $customer = Customer::where('customer_email',$provider->getEmail())->first();

           if(!$customer){
            $customer = Customer::create([
                'customer_name' => $provider->getName(),
                'customer_email' => $provider->getEmail(),
                'customer_picture' => '',
                'customer_password' => '',
                'customer_phone' => ''
            ]);
        }
        $customer_login->customer()->associate($customer);
        $customer_login->save();

        $account_new = Customer::where('customer_id',$customer_login->user)->first();
        Session::put('customer_id',$account_new->customer_id);
        Session::put('customer_name',$account_new->customer_name);


        return redirect('/login-checkout')->with('message', 'Đăng nhập bằng tài khoản facebook <span style="color:red">'.$account_new->customer_email.'</span> thành công');      


    }
    }


    public function AuthLogin(){
     
        
        if(Session::get('login_normal')){

            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        } 
    
            // $admin_id = Auth::id();
        
        // if($admin_id){
        //     return Redirect::to('dashboard');
        // }else{
        //     return Redirect::to('admin')->send();
        // } 
    
    
    
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){

        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        
        if($login){
            $login_count = $login->count();
       if($login_count>0){
           Session::put('admin_name',$login->admin_name);
           Session::put('admin_id',$login->admin_id);
           return Redirect::to('/dashboard');
       }
       
       }else{
        Session::put('message','Mật khâu hoặc tài khoản không đúng');
        return Redirect::to('/admin');
     }
   
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('login_normal',null);
        return Redirect::to('/admin')->with('message','Đăng xuất  thành công');
    }    
}