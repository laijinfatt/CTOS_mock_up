<?php

namespace App\Http\Controllers\Pages;

use DB;
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
    
    //right now cannot ensure that member is registered before adding them to blacklist
    public function add(Request $request)
    {
        //$users = User::find($request->user_name);
        
        $request->validate([
            'user_name' => 'required',
            'reason' => 'required',
            'remark' => 'nullable'
        ]);

        
            $data = $request->all();
            $check = $this->create($data);

            return redirect('dashboard')->withSuccess('You have added a member to blacklist.');
        
    }

    public function create(array $data)
    {
        return Blacklist::create([
            'user_name' => $data['user_name'],
            'reason' => $data['reason'],
            'remark' => $data['remark'],
        ]);
    }
}
