<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersHashesCreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test()
    {
        $response = $this->post('api/users_hashes', [
                'words' => [
                    [
                        'id' => 1,
                        'name' => 'word',
                    ]
                ],
                'algorithms' => [
                    [
                        'id' => 1,
                        'name' => 'sha1',
                    ],
                ]
        ]);

        $response->assertStatus(201);
    }
}
