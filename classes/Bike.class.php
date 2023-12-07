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
            ],
            'customer_id' => [
                'type' => 'many2one',
                'foreign_object' => 'bike_rental\Customer',
                'description' => 'Id of the customer currently using the bike'
            ]
        ];
    }
}
