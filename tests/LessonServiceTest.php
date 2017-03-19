<?php
namespace Tests;
use App\FixedLessonsTariffEntity;
use App\LessonEntity;
use App\LessonService;
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
        $lessonService->calculateLessonsPrice();
        self::assertEquals(100,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withTwoLessonOneHour_shouldReturn200()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->calculateLessonsPrice();
        self::assertEquals(200,$lessonService->calculateLessonsPrice());
    }

    public function test_calculateLessonsCost_withTwoOneHourAndOneFixed_shouldReturn400()
    {
        $lessonService = new LessonService();
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createLessonByHours(1));
        $lessonService->addLesson($this->createFixedLesson());
        $lessonService->calculateLessonsPrice();
        self::assertEquals(400,$lessonService->calculateLessonsPrice());
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