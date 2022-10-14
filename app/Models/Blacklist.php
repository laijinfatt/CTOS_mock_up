<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'userID',
        'reason',
        'remark'
    ];

    public function blacklist(){
        return $this->hasMany('App/Models/User');
    }
}
