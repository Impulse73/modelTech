<?php

namespace Import\Handlers;

use Import\Handlers\BaseCar;

class Car extends BaseCar
{
    /**
     * @param array $data
     * @return \Model\BaseCar
     */
    function createModel(array $data): \Model\BaseCar
    {
        $model = new \Model\Machine\Car();
        $model->setCarType($data['car_type'])
            ->setBrand($data['brand'])
            ->setCarrying($data['carrying'])
            ->setPhotoFileName($data['photo_file_name'])
            ->setPassengerSeatsCount($data['passenger_seats_count']);

        return $model;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValuePassengerSeatsCount($value) {
        return !empty($value) && ctype_digit($value);
    }
}