<?php

namespace Model\Machine;

use Model\BaseCar;

class Car extends BaseCar
{
    protected int $passengerSeatsCount;

    /**
     * @return int
     */
    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }

    /**
     * @param int $passengerSeatsCount
     * @return Car
     */
    public function setPassengerSeatsCount(int $passengerSeatsCount)
    {
        $this->passengerSeatsCount = $passengerSeatsCount;
        return $this;
    }
}