<?php

namespace bike_rental;

use equal\orm\Model;

class Customer extends Model
{
    public static function getColumns(): array
    {
        return [
            'firstname' => [
                'type' => 'string',
                'required' => true
            ],
            'lastname' => [
                'type' => 'string',
                'required' => true
            ],
            'name' => [
                'type' => 'computed',
                'result_type' => 'string',
                'store' => true,
                'function' => 'calcName'
            ],
            'phone_number' => [
                'type' => 'string',
                'required' => true,
                'usage' => 'phone'
            ],
            'email' => [
                'type' => 'string',
                'usage' => 'email'
            ],
        ];
    }

    public static function calcName($self)
    {
        $customersNames = [];
        $self->read(['firstname', 'lastname']);
        foreach ($self as $id => $customer) {
            $customersNames[$id] = sprintf('%s %s', $customer['firstname'], $customer['lastname']);
        }
        return $customersNames;
    }
}
