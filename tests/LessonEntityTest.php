<?php
namespace Tests;
use App\FixedLessonsTariffEntity;
use App\LessonEntity;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: bona2
 * Date: 19.03.17
 * Time: 20:09
 */
class LessonEntityTest extends TestCase
{
    /**
     * @var LessonEntity
     */
    private $lesson;

    
    public function setUp()
    {
         $this->lesson = new LessonEntity(new FixedLessonsTariffEntity());
    }
    
    public function test_type_speaking_success()
    {
         $this->lesson->setType(LessonEntity::GRAMMAR_TYPE);
         $this->assertTrue($this->lesson->isValidType());
    }

    public function test_type_grammar_success()
    {
        $this->lesson->setType(LessonEntity::SPEAKING_TYPE);
        $this->assertTrue($this->lesson->isValidType());
    }

    public function test_type_uniqueString_fail()
    {
        $this->lesson->setType($this->getRandomString());
        $this->assertFalse($this->lesson->isValidType());
    }


    private function getRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for ($i = 0; $i < 10; $i++) {
            $result = $characters[rand(0, strlen($characters))];
        }
        return $result;
    }
}