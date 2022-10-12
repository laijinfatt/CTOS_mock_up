<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

// here is the code for settling login,register,logout function
class AuthController extends Controller
{
    public function index(){

        return view('auth.login');

    }

    public function agentRegistration(){

        return view('auth.agentRegistration');

    }

    public function userRegistration(){

        return view('auth.userRegistration');

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
            'type' => 'required',
            'handphone_number' => 'nullable',
            'status' => 'nullable',
            'gender' => 'nullable',
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
            'handphone_number' => $data['handphone_number'],
            'gender' => $data['gender'],
            'status' => $data['status'],
            'type' => $data['type']
        ]);
    }

    public function viewAgent()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->get();
        return view("pages.showAgent")->with(["users" => $users]);
    }

    public function viewMember()
    {
        $users = User::all()->where('type','1');
        return view("pages.showMember")->with(["users" => $users]);
    }

    public function editMember($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editMember')->with(["users" => $users]);
    }

    public function editAgent($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editAgent')->with(["users" => $users]);
    }

    public function update(Request $r)
    {
        $users = User::find($r->id);
        $r->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'status' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number' => 'nullable',
            'bank_company' => 'nullable'
        ]);

        $users->name = $r->name;
        $users->password = $r->password;
        $users->email = $r->email;
        $users->handphone_number = $r->handphone_number;
        $users->gender = $r->gender;
        $users->status = $r->status;
        $users->ic = $r->ic;
        $users->bank_account_number = $r->bank_account_number;
        $users->bank_company = $r->bank_company;
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
