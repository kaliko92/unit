<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['id', 'name', 'unitId'];
    public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unitId');
        
    }
    public function units()
    {
        return $this->belongsToMany(Unit::class,'stock', 'productId', 'unitId');
    }
    
}
