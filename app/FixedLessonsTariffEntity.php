<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 23:23
 */

namespace App;

class FixedLessonsTariffEntity implements LessonTariffInterface
{
    /**
     * @var int
     */
    private $defaultPrice = 200;

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

    public function getPrice(): int
    {
        return $this->getDefaultPrice();
    }
}