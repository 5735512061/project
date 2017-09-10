<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','pro_name','pro_type','pro_detail','pro_price','pro_sale_price','pro_maf_date','pro_ex_date','pro_amount'];
}
