<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adduser extends Model
{
    protected $fillable = ['id','username','date','latest','access','status'];
}
