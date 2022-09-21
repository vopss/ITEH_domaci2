<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Driver::truncate();
        Vehicle::truncate();
        Manufacturer::truncate();

        $this->call(DriverSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}
