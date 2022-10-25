<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'name',
        'email',
        'handphone_number',
        'ic',
        'bank_account_number1',
        'bank_account_number2',
        'bank_account_number3',
        'gender',
        'reason',
        'remark',
        'created_by',
        'deleted_by',
        'social_media_account'
    ];
}
