<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'id';

    public function products(){
        return $this->hasMany(Product::class,'id', 'product_id');
    }
    public function attributes(){
        return $this->hasMany(ProductAtt::class,'id', 'productAtt_id');
    }

}
