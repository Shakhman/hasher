<?php

use Illuminate\Database\Seeder;

class VocabulariesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vocabulary::class, 20)->create();
    }
}
