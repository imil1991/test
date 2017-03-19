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
     * @var string
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
    }


    /**
     * @return string
     */
    public function getType(): string
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

     /**
     * @return LessonTariffInterface
     */
    public function getTariff(): LessonTariffInterface
    {
        return $this->tariff;
    }

    /**
     * @return array
     */
    public function getAllTypes() : array
    {
        return [self::GRAMMAR_TYPE, self::SPEAKING_TYPE];
    }

    /**
     * @return bool
     */
    public function isValidType() : bool
    {
        return in_array($this->getType(), $this->getAllTypes(), true);
    }

}