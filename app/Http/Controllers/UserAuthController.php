<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    //
    public function showLogin($guard){

        return response()->view('cms.auth.login', ['$guard' => $guard]);
        }

    public function login(Request $request){
       
        $validator = Validator($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|string|min:3', 
            'remember' => 'boolean',
            'guard' => 'required|string|in:admin',
          ]
          ,[
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
            // dd();
            if (Auth::guard($request->get('guard'))->attempt($credenials, $request->get('remember_me'))) {  
                 
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
    
   public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', 'admin');
    }
}
