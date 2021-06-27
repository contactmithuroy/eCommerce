<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productAtt extends Model
{
    use HasFactory;

    public function size(){
        return $this->belongsTo('App\Models\Admin\Size');
    }
    public function color(){
        return $this->belongsTo('App\Models\Admin\color');
    }
    public function product(){
        return $this->belongsTo('App\Models\Admin\product');
    }
}
 