<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Stubs\EventStub;
use Tests\Stubs\ListenerStub;
use TypeError;

class ListenerTest extends TestCase
{
    /** @test */
    public function handle_method_throws_if_invalid_event_given()
    {
        $this->expectException(TypeError::class);

        $listener  =new ListenerStub();

        $listener->handle('not an event');
    }

    /** @test */
    public function handle_method_accepts_event()
    {
        $listener  =new ListenerStub();

        $listener->handle(new EventStub);
    
        $this->addToAssertionCount(1);
    }


}
