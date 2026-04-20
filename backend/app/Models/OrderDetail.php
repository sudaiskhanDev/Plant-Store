<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_detail_id';

    protected $fillable = [
        'order_id',
        'plant_id',
        'quantity',
        'price'
    ];

    // relation: order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    // relation: plant
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }
}