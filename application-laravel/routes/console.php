<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('relatorio:vendas')->dailyAt('18:00');
