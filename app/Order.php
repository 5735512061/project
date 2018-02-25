<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['order_id','amount','pro_id','user_id'];
    protected $primaryKey = 'order_id';
}
