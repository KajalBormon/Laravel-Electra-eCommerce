<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        /* return $this->hasOne('App\Model\User','id','user_id'); */
        return $this->hasOne(User::class,'id','user_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
        //return $this->hasOne('App\Models\Product','id','product_id');
    }
}
