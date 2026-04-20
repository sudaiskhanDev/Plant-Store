<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $primaryKey = 'maintenance_id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'plant_id',
        'task_type',
        'scheduled_date',
        'status'
    ];

    protected $casts = [
        'scheduled_date' => 'date',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }
}