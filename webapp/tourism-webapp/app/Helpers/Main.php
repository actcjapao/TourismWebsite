<?php

namespace App\Helpers;

class Main
{
    public static function getSiteBasicInfo()
    {
        return (object) [
            'site' => 'MJ Bohol Tours',
            'contact' => '+63 912 345 6789',
            'email' => 'info@mjboholtours.com',
            'address' => 'Danao, Bohol'
        ];
    }
}
