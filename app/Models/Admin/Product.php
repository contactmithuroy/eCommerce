<?php

namespace App\Models\Admin;

use App\Models\Admin\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category');
    }
    public function admin(){
        return $this->belongsTo('App\Models\Admin\Admin','user');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Admin\Brand','id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'product_id', 'id');
    }
    // public function attribute(){
    //     return $this->belongsTo('App\Models\Admin\ProductAtt','product_id','id');
    // }

    public function attributes(){
        return $this->hasMany(productAtt::class,'product_id', 'id');
    }

}
  