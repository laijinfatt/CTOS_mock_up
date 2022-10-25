<?php

namespace App\Http\Controllers\Pages;

use DB;
use Session;
use App\Models\User;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAgent;
use App\Http\Controllers\Controller;

class BlacklistController extends Controller
{
    public function addToBlacklist()
    {
        return view('pages.blacklist.add');
    }
   
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
            'reason' => 'required',
            'remark' => 'nullable',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('dashboard')->withSuccess('You have added a person to blacklist.');
    }

    public function create(array $data)
    {
        return Blacklist::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'handphone_number' => $data['handphone_number'],
            'gender' => $data['gender'],
            'ic' => $data['ic'],
            'bank_account_number1' => $data['bank_account_number1'],
            'bank_account_number2' => $data['bank_account_number2'],
            'bank_account_number3' => $data['bank_account_number3'],
            'reason' => $data['reason'],
            'remark' => $data['remark'],
        ]);
    }
    
    public function viewBlacklist()
    {
        $users = Blacklist::all();
        return view('pages.blacklist.view')->with(["users" => $users]);
        
    }

    public function edit($id)
    {
        $blacklists = Blacklist::all()->where('id',$id);
        return view('pages.blacklist.edit')->with(["blacklists" => $blacklists]);
    }

    public function update(Request $r)
    {
        $blacklists = Blacklist::find($r->id);

        $r->validate([
            'name' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
            'reason' => 'required',
            'remark' => 'nullable',
        ]);

        $blacklists->name = $r->name;
        $blacklists->email = $r->email;
        $blacklists->handphone_number = $r->handphone_number;
        $blacklists->gender = $r->gender;
        $blacklists->ic = $r->ic;
        $blacklists->bank_account_number1 = $r->bank_account_number1;
        $blacklists->bank_account_number2 = $r->bank_account_number2;
        $blacklists->bank_account_number3 = $r->bank_account_number3;
        $blacklists->reason = $r->reason;
        $blacklists->remark = $r->remark;
        $blacklists->save();

        Session::flash('success',"Blacklisted person was updated successfully!");
        return redirect()->route('dashboard');
    }

    /*public function delete($id)
    {
        $blacklists = Blacklist::find($id);
        $blacklists->delete();

        Session::flash('success',"Blacklisted person was deleted from record successfully!");
        return redirect()->back();
    }*/
}
