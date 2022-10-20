<?php

namespace App\Http\Controllers\Pages;

use DB;
use Session;
use App\Models\User;
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
   
    //similar to update
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
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
            'reason' => $data['reason'],
            'remark' => $data['remark'],
        ]);
    }
    
    public function viewBlacklist()
    {
        $users = Blacklist::all();
        return view('pages.blacklist.view')->with(["users" => $users]);
        
    }
}
