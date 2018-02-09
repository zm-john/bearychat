<?php

namespace Quhang\BearyChat;

use Illuminate\Support\Facades\Facade;

class BearyChat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bearychat';
    }
}
