<?php
namespace Tests;
use App\FixedLessonsTariffEntity;
use App\LessonEntity;
use App\LessonService;
use App\LessonTariffInterface;
use App\NewTariff;
use App\NewTypeLesson;
use App\SpeakingTypeLesson;
use App\VariableLessonsTariffEntity;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 19:56
 */
class LessonServiceTest extends TestCase
{
    /**
     * @expectedException \Exception
     */
    public function test_calculateLessonsCost_withoutLessons_shouldTrowException()
    {
        $lessonService = new LessonService();
        $lessonService->calculateLessonsPrice();
    }

    public function test_calculateLessonsCost_withOneLessonOneHour_shouldReturn100()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonByHours(1));
        self::assertEquals(100,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withTwoLessonOneHour_shouldReturn200()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createLessonByHours(1));
        self::assertEquals(200,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withTwoOneHourAndOneFixed_shouldReturn400()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createFixedLesson());
        self::assertEquals(400,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withNewTariff_shouldReturn300()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonWithNewTariff());
        self::assertEquals(300,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withOneLessonOneHourTariffSpeakingType_shouldReturn90()
    {
        $lessonService = new LessonService();
        $lesson = new LessonEntity(
            new VariableLessonsTariffEntity(1)
        );
        $lessonService->addLesson($lesson->setType(new SpeakingTypeLesson()));
        self::assertEquals(90, $lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withOneLessonOneHourTariffNewType_shouldReturn80()
    {
        $lessonService = new LessonService();
        $lesson = new LessonEntity(
            new VariableLessonsTariffEntity(1)
        );
        $lessonService->addLesson($lesson->setType(new NewTypeLesson()));
        self::assertEquals(80, $lessonService->calculateLessonsPrice());
    }

    /**
     * @param int $hours
     * @return LessonEntity
     */
    private function createLessonByHours(int $hours): LessonEntity
    {
        return new LessonEntity(
            new VariableLessonsTariffEntity($hours)
        );
    }

    private function createLessonWithNewTariff()
    {
        return new LessonEntity(
            new NewTariff()
        );
    }
    /**
     * @return LessonEntity
     */
    private function createFixedLesson(): LessonEntity
    {
        return new LessonEntity(
            new FixedLessonsTariffEntity()
        );
    }
}