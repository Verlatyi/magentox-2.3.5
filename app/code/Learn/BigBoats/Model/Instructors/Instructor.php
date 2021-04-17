<?php

namespace Learn\BigBoats\Model\Instructors;

class Instructor
{
    private $firstName;
    private $lastName;
    private $experience;
    private $certificate;

    public function __construct(
        $firstName = "Roman",
        $lastName = "Verlatyi",
        $experience = 5,
        array $certificate = ["swiming" => 2, "rescue" => 1]
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->experience = $experience;
        $this->certificate = $certificate;
    }
}
