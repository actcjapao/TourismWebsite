<?php

namespace App\Helpers;

use App\Models\Destinations;

class Main
{   
    /**
     * Get the basic information of the site.
     *
     * This function returns a basic object containing the site's name,
     * contact number, email address, and physical address.
     *
     * @return object An object with the following properties:
     *                - site: string (name of the site)
     *                - contact: string (contact number)
     *                - email: string (email address)
     *                - address: string (physical address)
     */
    public static function getSiteBasicInfo()
    {
        return (object) [
            'site' => 'MJ Bohol Tours',
            'contact' => '+63 912 345 6789',
            'email' => 'info@mjboholtours.com',
            'address' => 'Danao, Bohol'
        ];
    }

    /**
     * Get the destination names from a comma-separated string of destination IDs.
     *
     * This function takes a string of comma-separated destination IDs,
     * queries the database for their corresponding names, and returns
     * a comma-separated string of destination names.
     *
     * @param string $destination_str_id A comma-separated string of destination IDs
     *                                   (e.g., "1,2,3").
     *
     * @return string A comma-separated list of destination names.
     */
    public static function getDestinationNames($destination_str_id) {
        $destinationsIds = explode(',', $destination_str_id);

        $destinations = Destinations::whereIn('destination_id', $destinationsIds)
            ->pluck('name')
            ->implode(', ');

        return $destinations;
    }
}
