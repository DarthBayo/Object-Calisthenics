<?php

namespace Object\Calisthenics\Tests\Unit\Domain\Video;

use Object\Calisthenics\Domain\Student\Student;
use Object\Calisthenics\Domain\Video\InMemoryVideoRepository;
use Object\Calisthenics\Domain\Video\Video;
use PHPUnit\Framework\TestCase;

class InMemoryVideoRepositoryTest extends TestCase
{
    public function testFindingVideosForAStudentMustFilterAgeLimit()
    {
        $repository = new InMemoryVideoRepository();

        // [21, 20, 19, 18, 17]
        for ($i = 21; $i >= 17; $i--) {
            $video = new Video();
            $video->setAgeLimit($i);
            $repository->add($video);
        }

        $student = $this->createStub(Student::class);
        $student->method('age')->willReturn(19);

        $videoList = $repository->videosFor($student);

        self::assertCount(3, $videoList);
    }
}
