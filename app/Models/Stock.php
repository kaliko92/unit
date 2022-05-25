<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $fillable = ['id', 'qty', 'unitId', 'productId'];
    // public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unitId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'productId');
    }
}
