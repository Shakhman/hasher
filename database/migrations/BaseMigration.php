<?php

namespace App\Database;

use App\Traits\RawTrait;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Migrations\Migration;

class BaseMigration extends Migration
{
    use RawTrait;

    protected function callSeed(string $seedName)
    {
        Artisan::call('db:seed', [
            '--class' => $seedName . 'TableSeeder',
        ]);
    }

    protected function timestamps($table)
    {
        $table->timestamp('created_at')->default(self::currentTimestamp());
        $table->timestamp('updated_at')->default(self::onUpdateTimestamp());
    }
}
