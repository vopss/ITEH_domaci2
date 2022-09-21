<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
    ];

    protected $guarded = [
        'id'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
