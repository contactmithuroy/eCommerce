<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function admin(){
        return $this->belongsTo('App\Models\Admin','user');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','id');
    }

    public function attributes(){
        return $this->hasMany(productAtt::class,'product_id', 'id');
    }

}
  