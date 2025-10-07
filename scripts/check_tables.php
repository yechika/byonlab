<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

echo 'sessions: '.(Schema::hasTable('sessions') ? 'yes' : 'no')."\n";
echo 'sponsors: '.(Schema::hasTable('sponsors') ? 'yes' : 'no')."\n";
echo 'heroes: '.(Schema::hasTable('heroes') ? 'yes' : 'no')."\n";
