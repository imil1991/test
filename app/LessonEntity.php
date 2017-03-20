<?php
/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 20:05
 */

namespace App;

class LessonEntity
{
    const GRAMMAR_TYPE = 'Grammar';
    const SPEAKING_TYPE = 'Speaking';
    /**
     * @var LessonTypeInterface
     */
    private $type;

    /**
     * @var LessonTariffInterface
     */
    private $tariff;

    /**
     * LessonEntity constructor.
     * @param LessonTariffInterface $lessonTariff
     */
    public function __construct(LessonTariffInterface $lessonTariff)
    {
        $this->tariff = $lessonTariff;
        $this->type = new GrammarTypeLesson();
    }


    /**
     * @return LessonTypeInterface
     */
    public function getType() : LessonTypeInterface
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType(LessonTypeInterface $type)
    {
        $this->type = $type;
        return $this;
    }

     /**
     * @return LessonTariffInterface
     */
    public function getTariff(): LessonTariffInterface
    {
        return $this->tariff;
    }


    public function getPrice() : int
    {
        return  $this->getTariff()->getPrice() - $this->getTariff()->getPrice() * $this->getType()->getDiscount()/100;
    }


}