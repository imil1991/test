<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 20:22
 */

namespace App;

interface LessonTariffInterface
{
    public function getPrice() : int;
}