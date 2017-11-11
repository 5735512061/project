<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['cart_id','amount','pro_id','user_id'];
    protected $primaryKey = 'cart_id';

    public $timestamps=false;
}
