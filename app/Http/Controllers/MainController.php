<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function register() {
        return view('auth.register');
    }
    
    public function save(Request $request) {
        
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12|'
            . 'required_with:password_confirmation|same:confirm_password',
            'confirm_password' => 'required|min:5|max:12'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        
        if($save){
            return back()->with('success',
                    'New user have been successfully added to the database');
        }else{
            return back()->with('fail',
                    'Something went wrong,please try again later');
        }
    }
    
    public function check(Request $request) {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        
        $userInfo = User::where('email', '=', $request->email)->first();
        
        if(!$userInfo){
            return back()->with('fail',
                    'Entered emil or password is incorrect.');
        }else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('/');
            } else {
                return back()->with('fail',
                        'Entered emil or password is incorrect.');
            }
        }
    }
    
    public function logout() {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
    
}
