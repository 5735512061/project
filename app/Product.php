<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','pro_name','pro_type','subtype','pro_detail','pro_price','pro_sale_price','pro_maf_date','pro_ex_date','pro_amount','unit','picture'];
    protected $primaryKey = 'id';

    public $timestamps=false;
}
