<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'viewer'
    ];
    
    // use HasFactory;
    // protected $guarded = [];
     
    public function visitViewer(){
        return $this->hasOne(Visit::class, 'product_id');
    }
}
