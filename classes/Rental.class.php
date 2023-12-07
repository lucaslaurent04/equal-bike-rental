<?php

namespace bike_rental;

use equal\orm\Model;

class Rental extends Model
{
    public static function getColumns(): array
    {
        return [
            'customer_id' => [
                'type' => 'many2one',
                'foreign_object' => 'bike_rental\Customer',
                'description' => 'Id of the customer who rented the bike'
            ],
            'bikes_ids' => [
                'type' => 'many2many',
                'foreign_object' => 'bike_rental\Bike',
                'foreign_field' => 'rentals_ids',
                'rel_table' => 'bike_rental_rel_rental_bike',
                'rel_foreign_key' => 'bike_id',
                'rel_local_key' => 'rental_id'
            ],
            'start' => [
                'type' => 'datetime',
                'default' => time()
            ],
            'end' => [
                'type' => 'datetime',
                'default' => time() + (3600 * 2)
            ]
        ];
    }
}
