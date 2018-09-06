<?php

namespace App\Http\Controllers\Application\UsersHashes;

use App\User;
use App\UsersHash;
use App\Http\Controllers\Controller;

class UsersHashesGetUserHashes extends Controller
{
    public function __invoke()
    {
        $userId = User::whereIp($_SERVER['REMOTE_ADDR'])->first()['id'];
        $result = UsersHash::select([
            'users_hashes.id',
            'users_hashes.hash',
            'algorithms.name as algo',
            'vocabularies.word as origin',
        ])
        ->where('users_hashes.user_id', $userId)
        ->leftJoin('algorithms', 'algorithms.id', 'users_hashes.algorithm_id')
        ->leftJoin('vocabularies', 'vocabularies.id', 'users_hashes.vocabulary_id')
        ->orderBy('users_hashes.id', 'desc')
        ->get()
        ->toArray();

        return response($result, 200);
    }
}
