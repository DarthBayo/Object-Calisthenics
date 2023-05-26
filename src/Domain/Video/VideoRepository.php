<?php

namespace Object\Calisthenics\Domain\Video;

use Object\Calisthenics\Domain\Student\Student;

interface VideoRepository
{
    public function add(Video $video): self;
    public function videosFor(Student $student): array;
}
