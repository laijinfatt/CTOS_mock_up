<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// here is the code for settling login,register,logout function
class AuthController extends Controller
{
    public function index(){

        return view('auth.login');

    }

    public function agentRegistration(){

        return view('auth.agentRegistration');

    }

    public function postLogin(Request $request){

        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        $credentials = $request->only('password', 'email');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->withSuccess('You have successfully logged in!');
        }

        return redirect('login')->withSuccess('Your password or email is incorrect. Please re-enter again.');

    }

    public function postRegistration(Request $request){

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'type' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('dashboard')->withSuccess('You have successfully logged in!');
    }

    public function dashboard(){

        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->withSuccess('You do not have access to this page!');
    }

    public function create(array $data){

        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
        ]);
    }

    public function logout(){

        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
