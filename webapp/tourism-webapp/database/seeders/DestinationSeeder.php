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
            'address' => 'Carmen, Bohol',
            'local_url' => 'assets/images/destinations/chocolate_hills/chocolate_hills-1-min.jpg',
            'alt' => 'Image of Chocolate Hills',
            'source' => ''
        ]);

        Destinations::create([
            'name' => 'Loboc River Cruise',
            'address' => 'Loboc, Bohol',
            'local_url' => 'assets/images/destinations/loboc_river/loboc_river-2-min.jpg',
            'alt' => 'Image of Loboc River and Floating Restaurant',
            'source' => '@klook'
        ]);

        Destinations::create([
            'name' => 'Man-Made Forest',
            'address' => 'Bilar, Bohol',
            'local_url' => 'assets/images/destinations/bilar_man_made_forest/bilar_man_made_forest-1-min.jpg',
            'alt' => 'Image of Man-made forest',
            'source' => 'Philippine Embassy in Switzerland Facebook Page'
        ]);

        Destinations::create([
            'name' => 'Alona Beach',
            'address' => 'Panglao, Bohol',
            'local_url' => 'assets/images/destinations/alona_beach/alona_beach-1-min.jpg',
            'alt' => 'Image of Alona Beach',
            'source' => '@inzywinzyspider on Instagram'
        ]);

        Destinations::create([
            'name' => 'Tarsier Sanctuary',
            'address' => 'Bohol, Philippines',
            'local_url' => 'assets/images/destinations/ph_tarsier_sanctuary/ph_tarsier_sanctuary-1-min.jpg',
            'alt' => 'Image of Tarsier',
            'source' => '@arjiedj on Instagram'
        ]);

        Destinations::create([
            'name' => 'Danao Adventure Park',
            'address' => 'Danao, Bohol',
            'local_url' => 'assets/images/destinations/danao_adventure_park/danao_adventure_park-1-min.jpg',
            'alt' => 'Image of a man about to go to swing',
            'source' => '@clarkkhent14 on Instagram'
        ]);

        Destinations::create([
            'name' => 'Alicia Panoramic Park',
            'address' => 'Alicia, Bohol',
            'local_url' => 'assets/images/destinations/alicia_panoramic_park/alicia_panoramic_park-1-min.jpg',
            'alt' => 'Image of Top Hills',
            'source' => '@missdiyown on Instagram'
        ]);

        Destinations::create([
            'name' => 'Sapitan Twin Hangging Bridge',
            'address' => 'Sevilla, Bohol',
            'local_url' => 'assets/images/destinations/sapitan_twin_hangging_bridge/sapitan_twin_hangging_bridge-1-min.jpg',
            'alt' => 'Image of Bridge',
            'source' => '@batanguenonglayas on Instagram'
        ]);
    }
}
