<?php

namespace Import;

use Import\Handlers\BaseCar;
use Import\Handlers\Car;
use Import\Handlers\SpecMachine;
use Import\Handlers\Truck;

class ImportCsv
{
    /**
     * @var array
     */
    protected array $keys = [];

    /**
     * @var array
     */
    protected array $result = [];

    /**
     * @var array
     */
    protected array $handlers = [];

    /**
     * @var array
     */
    protected array $createdModels = [];

    public function __construct($file)
    {
        $this->getHandlers();
        $this->getCarList($file);
    }

    /**
     * @return void
     */
    protected function getHandlers()
    {
        $this->handlers = [
            'car'         => new Car(),
            'truck'       => new Truck(),
            'spec_machine' => new SpecMachine()
        ];
    }

    /**
     * @param $file
     * @return void
     */
    protected function getCarList($file)
    {
        $row = 1;

        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            if ($row == 1) {
                $this->keys =  array_filter($data, function($element) {
                    return !empty($element);
                });
            } else {
                $rowItems = [];

                if ($this->isEmptyRow($data)) {
                    continue;
                }

                foreach ($data as $index => $value) {
                    if (isset($this->keys[$index])) {
                        $rowItems[$this->keys[$index]] = $value;
                    }
                }

                $this->result[] = $rowItems;
            }

            $row++;
        }

        fclose($file);
        $this->createCarsFromList();
    }

    /**
     * @param $row
     * @return bool
     */
    protected function isEmptyRow($row): bool
    {
        $row = array_filter($row, function($element) {
            return !empty($element);
        });

        if (count($row) == 0) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    protected function createCarsFromList()
    {
        $list = $this->result;
        $cars = [];

        foreach ($list as $item) {
            $handler = $this->handlers[$item['car_type']];
            if ($handler) {
                /* @var BaseCar $handler */
                if ($handler->canCreateModelFromData($item)) {
                    $cars[] = $handler->createModel($item);
                }
            }
        }

        $this->createdModels = $cars;

        return $cars;
    }

    /**
     * @return array
     */
    public function getCreatedModels()
    {
        return $this->createdModels;
    }
}