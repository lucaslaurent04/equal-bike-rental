<?php

namespace bike_rental;

use equal\orm\Model;

class Bike extends Model
{
    private static $colors = ['blue', 'black', 'grey', 'red', 'yellow', 'white'];
    private static $usage_states = ['bad', 'good'];

    public static function getColumns(): array
    {
        return [
            'rentals_ids' => [
                'type' => 'many2many',
                'foreign_object' => 'bike_rental\Rental',
                'foreign_field' => 'bikes_ids',
                'rel_table' => 'bike_rental_rel_rental_bike',
                'rel_foreign_key' => 'rental_id',
                'rel_local_key' => 'bike_id'
            ],
            'color' => [
                'type' => 'string',
                'description' => 'Frame color',
                'required' => true,
                'selection' => self::$colors
            ],
            'size' => [
                'type' => 'integer',
                'description' => 'Bike size'
            ],
            'usage_state' => [
                'type' => 'string',
                'description' => 'Bike usage state',
                'required' => true,
                'selection' => self::$usage_states
            ],
            'available' => [
                'type' => 'boolean',
                'description' => 'Is the bike currently available',
                'default' => false
            ]
        ];
    }
}
