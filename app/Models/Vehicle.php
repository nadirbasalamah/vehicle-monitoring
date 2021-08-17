<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'vehicle_type',
        'fuel_consumption',
        'service_schedule',
        'driver',
        'agreement',
        'start_date',
        'finish_date'
    ];
}
