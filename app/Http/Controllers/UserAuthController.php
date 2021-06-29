<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    //
    public function showLogin(){

        return response()->view('cms.login');
    }
    public function login(Request $request){
        dd($request->all());
           $validator = Validator($request->all(),[
          'email' => 'required|string|email',
          'password' => 'required|string|min:3',
          'remember' => 'boolean',
          'guard' => 'required|string|in:admin,author'
        ],[
            'email.required' => 'رجاء, أدخل البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني المدخل غير صحيح',
            'password.required' => 'رجاء, أدخل كلمة المرور',
            'guard.in' => 'تأكد من صحة رابط صفحة تسجيل الدخول'
        ]
    );

        $credenials = [
           'email'=>$request->get('email'),
           'password'=>$request->get('password'),

        ];
        if(!$validator->fails()){
            if(Auth::guard($request->get('guard'))->attempt($credenials,$request->get('remember'))){
                // if(Auth::guard('web')->attempt($credenials,$request->get('remember_me'))){

                // $user = Auth::guard('admin')->user();
                // $user->assignRole('super-admin');
                return response()->json(['message'=> 'Logged in successfully'],200);
        }
        else{
            return response()->json(['message'=> 'Error email or password , login failed'], 400);
        }
    }
        else{
            return response()->json(['message'=> $validator->getMessageBag()->first()],400);
        }   
   }
    
    public function logout(){
        
    }
}
