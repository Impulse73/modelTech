<?php

namespace Import\Handlers;

use Import\Handlers\BaseCar;

class SpecMachine extends BaseCar
{

    /**
     * @param array $data
     * @return \Model\BaseCar
     */
    function createModel(array $data): \Model\BaseCar
    {
        $model = new \Model\Machine\SpecMachine();

        $model->setCarType($data['car_type'])
            ->setBrand($data['brand'])
            ->setCarrying($data['carrying'])
            ->setPhotoFileName($data['photo_file_name'])
            ->setExtra($data['extra']);

        return $model;
    }


    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValueExtra($value) {
        return !empty($value);
    }
}