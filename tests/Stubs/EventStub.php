<?php

namespace Tests\Stubs;

use App\Core\Event;


class EventStub extends Event
{
    public function getName()
    {
        return 'UserSignedIn';
    }
}
