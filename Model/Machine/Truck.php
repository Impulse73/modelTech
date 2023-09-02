<?php

namespace Model\Machine;

use Model\BaseCar;

class Truck extends BaseCar
{
    protected float $bodyWidth;
    protected float $bodyHeight;
    protected float $bodyLength;

    /**
     * @return float
     */
    public function getBodyWidth()
    {
        return $this->bodyWidth;
    }

    /**
     * @param float $bodyWidth
     * @return Truck
     */
    public function setBodyWidth(float $bodyWidth)
    {
        $this->bodyWidth = $bodyWidth;
        return $this;
    }

    /**
     * @return float
     */
    public function getBodyHeight()
    {
        return $this->bodyHeight;
    }

    /**
     * @param float $bodyHeight
     * @return Truck
     */
    public function setBodyHeight(float $bodyHeight)
    {
        $this->bodyHeight = $bodyHeight;
        return $this;
    }

    /**
     * @return float
     */
    public function getBodyLength()
    {
        return $this->bodyLength;
    }

    /**
     * @param float $bodyLength
     * @return Truck
     */
    public function setBodyLength(float $bodyLength)
    {
        $this->bodyLength = $bodyLength;
        return $this;
    }

    /**
     * @return float
     */
    public function getBodyVolume()
    {
        return $this->getBodyHeight() * $this->getBodyWidth() * $this->getBodyLength();
    }
}