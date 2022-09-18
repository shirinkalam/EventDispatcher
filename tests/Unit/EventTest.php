<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Stubs\EventStub;
use Tests\Stubs\EventStubNoName;

class EventTest extends TestCase
{
    /** @test */

    public function can_get_event_name()
    {
        $event  =new EventStub();

        $this->assertEquals('UserSignedIn',$event->getName());
    }

    /** @test */
    public function it_defaluts_to_an_event_name_of_the_class_name()
    {
        $event  =new EventStubNoName();

        $this->assertEquals('EventStubNoName',$event->getName());

    }
}
