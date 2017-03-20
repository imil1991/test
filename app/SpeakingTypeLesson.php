<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 20.03.17
 * Time: 20:53
 */

namespace App;

class SpeakingTypeLesson implements LessonTypeInterface
{
    private $discount = 10;
    /**
     * @var string
     */
    private $type = 'Speaking';

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * @return string
     */
    public function getType() :string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }


}