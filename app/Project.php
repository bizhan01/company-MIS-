<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','code','date', 'start', 'end', 'price', 'org', 'type', 'teacher', 'empolyee', 'site', 'payments'];
}
