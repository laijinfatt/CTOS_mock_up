<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class StatusController extends Controller
{
    public function _construct(){
        return $this->middleware([IsAdmin::class, 'auth']);
    }
}
