<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $primarykey='id';

    public function products(){
        return $this->hasMany(Product::class);
    }
}
