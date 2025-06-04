<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinations;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destinations::create([
            'name' => 'Chocolate Hills',
            'address' => 'Dev',
            'local_url' => 'admin',
            'alt' => 'admin',
            'source' => ''
        ]);
    }
}
