<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $fillable = ['fullname', 'gender', 'age_id', 'email', 'is_send_email', 'feedback'];
}
