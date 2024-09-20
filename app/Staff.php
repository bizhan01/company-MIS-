<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
      protected $fillable = ['name', 'fName', 'dob', 'degree', 'school', 'graduation', 'experience', 'position'  ];
}
