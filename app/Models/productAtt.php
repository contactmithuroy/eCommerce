<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productAtt extends Model
{
    use HasFactory;

    public function size(){
        return $this->belongsTo('App\Models\Size');
    }
    public function color(){
        return $this->belongsTo('App\Models\color');
    }
    public function product(){
        return $this->belongsTo('App\Models\product');
    }
}
