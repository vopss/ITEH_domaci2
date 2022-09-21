<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'country',
        'age',
        'height',
        'weight'
    ];

    protected $guarded = [
        'id'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
