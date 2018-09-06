<?php

namespace App\Http\Controllers\Application\Users;

use App\User;
use App\Http\Controllers\Controller;

class UsersCreate extends Controller
{
    public function __invoke()
    {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
        $ipData = file_get_contents("http://api.sypexgeo.net/json/" . $ip);
        $browser = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '{}';

        $user = User::create([
            'ip' => $ip,
            'browser' => $browser,
            'country' => json_decode($ipData)->country,
            'cookie' => json_encode($_COOKIE),
        ]);

        return $user;
    }
}
