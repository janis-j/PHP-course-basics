<?php

namespace Tests;

use App\Models\Person\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testPerson() :void
    {
        $person = new Person('300285-11221', "jānis", "Jankovs", "description");

        $this->assertEquals('30028511221', $person->id());
        $this->assertEquals("Jānis", $person->name());
        $this->assertEquals("Jankovs", $person->surname());
        $this->assertEquals("description", $person->description());
    }
}