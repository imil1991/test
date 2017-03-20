<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 20:01
 */

namespace App;

use Ds\Set;

class LessonService
{
    /**
     * @var Set | LessonEntity[]
     */
    private $lessonCollection;

    public function __construct()
    {
        $this->lessonCollection = new Set();
    }

    public function addLesson(LessonEntity $lesson)
    {
        $this->lessonCollection->add($lesson);
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function calculateLessonsPrice()
    {
        if($this->lessonCollection->isEmpty()){
            throw new \Exception('Not found any lessons');
        }

        $result = 0;
        foreach ($this->lessonCollection as $row){
            $result += $row->getPrice();
        }

        return $result;
    }

}