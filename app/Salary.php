<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['date','name','fName', 'salary', 'paid', 'rest'];
}
