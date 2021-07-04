<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image'
    ];

    // public function product()
    // {
    //     return $this->belongsTo('App\Models\Admin\Product');
    // }
    public function product(){
        return $this->belongsTo('App\Models\Admin\product');
    }
}
