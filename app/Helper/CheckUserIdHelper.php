<?php

namespace App\Helpers;

use App\User;
use App\Http\Controllers\Application\Users\UsersCreate;

class CheckUserIdHelper
{
    private $user;

    public function __invoke() : int
    {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

        $this->user = User::whereIp($ip)->first();

        if (!$this->user) {
            $this->user = (new UsersCreate)();
        }

        return $this->user['id'];
    }
}
