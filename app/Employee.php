<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'lName', 'fName', 'dob', 'province1', 'district1', 'region1', 'province2', 'district2', 'region2', 'position','tazkira', 'start', 'end', 'TIN', 'phone', 'status' ];
}
