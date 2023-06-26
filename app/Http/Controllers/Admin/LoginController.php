<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function getLogin(){
       return view('admin.login');
    }

    public function postLogin(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  رجاء المجاولة مجددا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
        //return redirect()->route('user.front')->with(['error' , 'هناك خطا بالبيانات']);
    }
        //we can Make Request make:request LoginRequest and add this code in it
    //     $messages=[
    //         'email.required' => 'البريد الإلكتروني مطلوب.',
    //         'email.email' => 'ادخل عنوان بريد إلكتروني صالح.',
    //         'password.required' => 'كلمة المرور مطلوبة.',
    //     ];
    //     $request->validate([
    //         'email','required',
    //         'password','required',

    //     ],$messages);

    //     $credentials=$request->only('email','password');
    //     if(auth()->attempt($credentials)){
    //         return redirect()->route('admin.login');
    //     }
    //     return redirect()->route('admin.login')->with('error','Faild');
    //     //return view('admin.login');
    // }

    // public function messages()
    // {
    //     return [
    //         'email.required' => 'البريد الإلكتروني مطلوب.',
    //         'email.email' => 'ادخل عنوان بريد إلكتروني صالح.',
    //         'password.required' => 'كلمة المرور مطلوبة.'
    //     ];


}
