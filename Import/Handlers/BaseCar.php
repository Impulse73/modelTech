<?php

namespace Import\Handlers;

use http\Exception\UnexpectedValueException;

abstract class BaseCar
{
    const CAR_TYPES = [
        'car' => 'car',
        'truck' => 'truck',
        'spec_machine' => 'specMachine'
    ];

    const FUNC_PREFIX = 'validateColumnValue';

    /**
     * @param array $data
     * @return bool
     */
    public function canCreateModelFromData(array $data)
    {
        foreach ($data as $key => $value) {
            $funcName = static::FUNC_PREFIX . $this->getCamelCaseKey($key);

            if (method_exists($this, $funcName)) {
                if (!$this->$funcName($value)) {
                    echo "Invalid argument($value) method($funcName)";
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param $key
     * @return string
     */
    protected function getCamelCaseKey($key) {
        $result = '';
        $words = explode('_', $key);
        foreach ($words as $word) {
            $result .= ucfirst($word);
        }

        return $result;
    }

    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValueCarType($value) {
        return !empty($value) && isset(static::CAR_TYPES[$value]);
    }

    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValuePhotoFileName($value) {

        if (!strrpos($value, '.')) {
            return false;
        }

        [$fileName, $fileType] = explode('.', $value);

        switch ($fileType) {
            case 'jpeg' :
                $cover_format = 'jpeg';
                break;
            case 'jpg' :
                $cover_format = 'jpg';
                break;
            case 'png' :
                $cover_format = 'png';
                break;
            case 'gif' :
                $cover_format = 'gif';
                break;
            default :
                $cover_format = null;
                break;
        }


        return !empty($value) && !empty($cover_format);
    }

    /**
     * @param $value
     * @return bool
     */
    protected function validateColumnValueBrand($value) {
        return !empty($value) && is_string($value);
    }

    protected function validateColumnValueCarrying($value) {
        return !empty($value) && is_numeric($value);
    }

    abstract function createModel(array $data) : \Model\BaseCar;
}