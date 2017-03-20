<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 20.03.17
 * Time: 20:53
 */

namespace App;

class GrammarTypeLesson implements LessonTypeInterface
{
     public function getDiscount(): int
    {
        return 0;
    }
}