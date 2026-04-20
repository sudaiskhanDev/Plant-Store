<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'supplier_order_id';

    protected $fillable = [
        'supplier_id',
        'plant_id',
        'quantity',
        'delivery_status',
    ];
}