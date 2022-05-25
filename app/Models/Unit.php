<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $fillable = ['id', 'name', 'rate', 'parentId'];
    public $timestamps = false;

    
    // public function base()
    // {
    //     return $this->belongsTo(Unit::class, 'parentId');
    // }

    public function subUnits()
    {
        return $this->belongsTo(Unit::class, 'parentId', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'stock', 'unitId', 'productId');
    }


    
    public static function GetAllowedForSaveParentId()
    {
        return self::where('parentId','==','0')->pluck('id');
    }
}
