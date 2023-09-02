<?php

namespace Model;

abstract class BaseCar
{
    protected string $carType;
    protected string $photoFileName;
    protected string $brand;
    protected float $carrying;

    /**
     * @return string
     */
    public function getCarType(): string
    {
        return $this->carType;
    }

    /**
     * @param string $carType
     * @return BaseCar
     */
    public function setCarType(string $carType)
    {
        $this->carType = $carType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    /**
     * @param string $photoFileName
     * @return BaseCar
     */
    public function setPhotoFileName(string $photoFileName)
    {
        $this->photoFileName = $photoFileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return BaseCar
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return float
     */
    public function getCarrying(): float
    {
        return $this->carrying;
    }

    /**
     * @param float $carrying
     * @return BaseCar
     */
    public function setCarrying(float $carrying)
    {
        $this->carrying = $carrying;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getPhotoFileExt()
    {
        [$filename, $fileType] = explode('.', $this->getPhotoFileName());
        return $fileType;
    }
}