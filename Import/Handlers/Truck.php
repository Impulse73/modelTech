<?php

namespace Import\Handlers;

use Import\Handlers\BaseCar;

class Truck extends BaseCar
{
    const TRUCK_SEPARATOR = 'x';

    /**
     * @param array $data
     * @return \Model\BaseCar
     */
    function createModel(array $data): \Model\BaseCar
    {
        $model = new \Model\Machine\Truck();
        if (!$data['body_whl']) {
            [$width, $height, $length] = [0, 0, 0];
        } else {
            [$width, $height, $length] = explode(static::TRUCK_SEPARATOR, $data['body_whl']);
        }

        $model->setCarType($data['car_type'])
            ->setBrand($data['brand'])
            ->setCarrying($data['carrying'])
            ->setPhotoFileName($data['photo_file_name'])
            ->setBodyWidth($width)
            ->setBodyHeight($height)
            ->setBodyLength($length);

        return $model;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValueBodyWhl($value) {
        if (empty($value)) {
            return true;
        }

        [$width, $height, $length] = explode(static::TRUCK_SEPARATOR, $value);

        if (is_numeric($width) && is_numeric($height) && is_numeric($length)) {
            return true;
        }

        return false;
    }
}