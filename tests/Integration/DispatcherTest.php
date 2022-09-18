<?php

namespace Tests\Integration;

use App\Core\Dispatcher;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\EventStub;
use Tests\Stubs\ListenerStub;

class DispatcherTest extends TestCase
{
    /** @test */

    public function it_can_dipatch_event()
    {
        $dispatcher = new Dispatcher();
        $event = new EventStub();

        $mockedlistener = $this->createMock(ListenerStub::class);

        $mockedlistener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('UserSignedIn' , $mockedlistener);

        $dispatcher->dispatch($event);
    }

    /** @test */

    public function it_can_dipatch_event_with_multiple_listener()
    {
        $dispatcher = new Dispatcher();
        $event = new EventStub();

        $mockedlistener = $this->createMock(ListenerStub::class);
        $anotherMockedlistener = $this->createMock(ListenerStub::class);

        $mockedlistener->expects($this->once())->method('handle')->with($event);
        $anotherMockedlistener->expects($this->once())->method('handle')->with($event);

        $dispatcher->addListener('UserSignedIn' , $mockedlistener);
        $dispatcher->addListener('UserSignedIn' , $anotherMockedlistener);

        $dispatcher->dispatch($event);
    }
}
