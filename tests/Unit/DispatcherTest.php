<?php

namespace Tests\Unit;

use App\Core\Dispatcher;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\ListenerStub;

class DispatcherTest extends TestCase
{
    /** @test */

    public function it_holds_listeners_in_array()
    {
        $dispatcher = new Dispatcher();

        $this->assertIsArray($dispatcher->getListeners());
        $this->assertEmpty($dispatcher->getListeners());
    }

    /** @test */

    public function it_can_add_listener()
    {
        $dispatcher = new Dispatcher();

        $dispatcher->addListener('UserSignedUp',new ListenerStub());

        $this->assertCount(1,$dispatcher->getListeners()['UserSignedUp']);
    }

    public function it_can_get_listeners_by_event_name()
    {
        $dispatcher = new Dispatcher();

        $dispatcher->addListener('UserSignedUp',new ListenerStub());

        $this->assertCount(1,$dispatcher->getListenersByEvent('UserSignedUp'));
    }

    
    public function it_returns_empty_array_if_no_listeners_set_for_event()
    {
        $dispatcher = new Dispatcher();

        $this->assertCount(0,$dispatcher->getListenersByEvent('UserSignedUp'));
    }

    public function it_can_check_if_has_listener_registerd_for_event()
    {
        $dispatcher = new Dispatcher();

        $this->assertFalse($dispatcher->hasListener('UserSignedUp'));
    }
}
