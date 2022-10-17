<?php

namespace App\Http\Controllers\Pages;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAgent;
use App\Http\Controllers\Controller;

class BlacklistController extends Controller
{
    public function addToBlacklist($id)
    {
        $users = User::all()->where('id',$id);
        return view('pages.blacklist.add')->with(["users" => $users]);
    }
    
    //right now cannot ensure that member is registered before adding them to blacklist
    //assume it's update
    public function add(Request $request)
    {
        $users = User::find($request->id);
        
        $request->validate([
            'reason' => 'nullable',
            'remark' => 'nullable'
        ]);

        $users->reason = $request->reason;
        $users->remark = $request->remark;

        return redirect('dashboard')->withSuccess('You have added a member to blacklist.');
        
    }

    public function viewBlacklist()
    {
        $users = User::all()->whereNotNull('reason');
        return view('pages.blacklist.view')->with(['users', $users]);
    }
}
