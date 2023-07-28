<?php

use App\Http\Controllers\ChannelController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('refresh-all-channels', function () {
    set_time_limit(0);
     (new ChannelController)->refreshGlobaly(); 
});
