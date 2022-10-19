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
    public function addToBlacklist($id)
    {
        $users = User::all()->where('id',$id);
        return view('pages.blacklist.add')->with(["users" => $users]);
    }
   
    //similar to update
    public function add(Request $request)
    {
        $users = User::find($request->id);
        
        if($users->reason === null){
            $request->validate([
                'reason' => 'nullable',
                'remark' => 'nullable'
            ]);
    
            $users->reason = $request->reason;
            $users->remark = $request->remark;
            $users->save();
    
            return redirect('dashboard')->withSuccess('You have added a member to blacklist.');
        }
        else{
            return redirect()->back()->with('error','This member has already listed in blacklist!');
        }
        
        
    }

    public function viewBlacklist()
    {
        $users = User::all()->whereNotNull('reason');
        return view('pages.blacklist.view')->with(["users" => $users]);
        
    }
}
