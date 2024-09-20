<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['number', 'date', 'subject', 'from', 'to', 'type', 'image'];
}
