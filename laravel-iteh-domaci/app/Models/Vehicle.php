<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'max_speed',
        'horsepower',
        'driver_id',
        'manufacturer_id',
        'fuel'
    ];

    protected $guarded = [
        'id',
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
