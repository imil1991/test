<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 20.03.17
 * Time: 20:03
 */

namespace App;

class NewTariff implements LessonTariffInterface
{

    public function getPrice(): int
    {
        return 300;
    }
}