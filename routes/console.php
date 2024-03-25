<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:send-admin-email')->daily();
Schedule::command('app:send-sellers-emails')->daily();
