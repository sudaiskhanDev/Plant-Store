<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_date',
        'total_amount',
        'status',
        'customer_id'
    ];

    // relation (user)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'user_id');
    }
}