<?php

use App\Algorithm;
use Illuminate\Database\Seeder;

class AlgorithmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Algorithm::insert([
            [
                'name' => 'md4',
            ],
            [
                'name' => 'md5',
            ],
            [
                'name' => 'sha1',
            ],
            [
                'name' => 'sha224',
            ],
            [
                'name' => 'sha256',
            ],
        ]);
    }
}
