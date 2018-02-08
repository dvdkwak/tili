<?php

namespace Tilit;

class Person
{
    private $birthdate;

    public function __construct()
    {
        date_default_timezone_set('Europe/Amsterdam');
    }

    public function getAge()
    {
        $birthdate = explode("/", $this->birthdate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthdate[0], $birthdate[1], $birthdate[2]))) > date("md")
            ? ((date("Y") - $birthdate[2]) - 1)
            : (date("Y") - $birthdate[2]));
        return $age;
    }

    public function setBirthdate($birthdate)
    {
        $date = explode("/", $birthdate);

        if (strlen($date[0]) === 2 && strlen($date[1]) === 2 && strlen($date[2]) === 4) {
            $this->birthdate = $birthdate;
        }
    }
}