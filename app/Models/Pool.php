<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'driver',
        'agreement_id',
        'start_date',
        'finish_date',
        'status',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // public function vehicles()
    // {
    //     return $this->hasMany('Vehicle');
    // }

    public function agreement()
    {
        return $this->belongsTo(User::class);
    }
}
