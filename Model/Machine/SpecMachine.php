<?php

namespace Model\Machine;

use Model\BaseCar;

class SpecMachine extends BaseCar
{
    protected string $extra;

    /**
     * @return string
     */
    public function getExtra(): string
    {
        return $this->extra;
    }

    /**
     * @param string $extra
     */
    public function setExtra(string $extra): void
    {
        $this->extra = $extra;
    }
}