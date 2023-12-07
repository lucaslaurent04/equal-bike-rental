<?php

namespace bike_rental;

use equal\orm\Model;

class Rental extends Model
{
    public static function getColumns(): array
    {
        return [
            'bike_id' => [
                'type' => 'many2one',
                'foreign_object' => 'bike_rental\Bike',
                'description' => 'Id of the rented bike'
            ],
            'customer_id' => [
                'type' => 'many2one',
                'foreign_object' => 'bike_rental\Customer',
                'description' => 'Id of the customer who rented the bike'
            ],
            'start' => [
                'type' => 'datetime'
            ],
            'end' => [
                'type' => 'datetime'
            ]
        ];
    }
}
