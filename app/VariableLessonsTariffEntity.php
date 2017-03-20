<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 23:23
 */

namespace App;

class VariableLessonsTariffEntity implements LessonTariffInterface
{
    /**
     * @var int
     */
    private $defaultPrice = 100;
    /**
     * @var int
     */
    private $hoursCount;

    /**
     * VariableLessonsTariffEntity constructor.
     * @param int $hoursCount
     */
    public function __construct(int $hoursCount)
    {
        $this->hoursCount = $hoursCount;
    }


    /**
     * @return int
     */
    public function getDefaultPrice(): int
    {
        return $this->defaultPrice;
    }

    /**
     * @param int $defaultPrice
     */
    public function setDefaultPrice(int $defaultPrice)
    {
        $this->defaultPrice = $defaultPrice;
    }

    /**
     * @return int
     */
    public function getHoursCount(): int
    {
        return $this->hoursCount;
    }

    /**
     * @return int
     */
    public function getPrice() : int
    {
        return $this->getHoursCount() * $this->getDefaultPrice();
    }
}