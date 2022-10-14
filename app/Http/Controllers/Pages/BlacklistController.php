<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAgent;
use App\Http\Controllers\Controller;

class BlacklistController extends Controller
{
    public function _construct(){
        if(auth()->user()->isAdmin())
        {
            return $this->middleware([IsAdmin::class, 'auth']);
        }
        else if(auth()->user()->isAgent())
        {
            return $this->middleware([IsAgent::class, 'auth']);
        }
    }

    public function create()
    {
        return view('');
    }
}
