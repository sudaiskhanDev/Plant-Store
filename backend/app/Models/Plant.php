<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $primaryKey = 'plant_id';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock_quantity',
        'description'
    ];

    // relation
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}