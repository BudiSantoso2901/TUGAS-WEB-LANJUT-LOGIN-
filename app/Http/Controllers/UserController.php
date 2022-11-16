<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function register()
    {
        # 
        return view("user/register");
    }
    public function processRegister(request $request)
    {
        $request->validate([
            "name"             => "required",
            "email"            => "required|unique:users",
            "password"         => "required|min:6",
            "reenter_password" => "required|same:password",
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['level'] = 0; // Member
        // dump($data);
        $user = User::create($data);
        // dd($user);
        event(new Registered($user));
        return redirect("user/register-success/{$user->id}")->withSuccess("Pendaftaran berhasil!");
    }
    public function login()
    {
        # code...
        return view("user/login");
    }

    public function registerSuccess($userID)
    {
        return view("user/register_success", [
            "userID" => $userID,
        ]);
    }
    public function processLogin(Request $request)
    {
        //form validation
        $credentials = $request->validate([
            "email"            => ['required', 'email'],
            "password"         => ['required'],
        ]);
        //proses validasi
        if (Auth::attempt($credentials)== true) {
            $request->session()->regenerate();
            if (Auth::user()->type == 0){//member
                return redirect('member');
            }else{ 
                return redirect('member/list');
            }   
           
           
           }else{
            return redirect(user/login)->withError("login gagal");
        }
    }
    public function processLogout()
    {
        Auth::logout();
 
       
     
        return redirect('/user/login');
    }
}
