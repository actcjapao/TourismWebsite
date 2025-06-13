<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Booking;

class DummyBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Set this to 100 depends on how many rows needed for testing
        $rowCount = 1;

        for ($i = 1; $i <= $rowCount; $i++) {
            Booking::create([
                'fullname' => "Customer$i",
                'email' => "customer$i@gmail.com",
                'contact' => "000000000$i",
                'destinations' => '1,2,4',
                'number_of_guests' => rand(1, 30), // random guest count
                'tour_date' => now()->addDays(rand(1, 30))->format('Y-m-d'),
                'pickup_time' => '08:00 AM',
                'pickup_location' => 'Bohol Tropics Resort',
            ]);
        }
    }
}
