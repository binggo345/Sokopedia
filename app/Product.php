<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'types_id', 'photo', 'name', 'price', 'desc'
    ];

    public function types(){
        return $this->belongsTo(Type::class);
    }
}
