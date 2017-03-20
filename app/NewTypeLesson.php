<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 20.03.17
 * Time: 21:43
 */

namespace App;

class NewTypeLesson implements LessonTypeInterface
{

    public function getDiscount(): int
    {
        return 20;
    }
}