<?php

namespace App\Http\Controllers\Application\UsersHashes;

use App\UsersHash;
use App\Helpers\HashWordsHelper;
use App\Helpers\CheckUserIdHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserHashesCreateRequest as Request;

class UsersHashesCreate extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->all();

        // Get id of an existing user or create a new user and get his id
        $userId = (new CheckUserIdHelper)();

        $hashedData = (new HashWordsHelper())($validatedData, $userId);

        if (empty($hashedData)) {
            return response('Internal Server Error', 500);
        }

        $currentItemsCount = count($hashedData);

        UsersHash::insert($hashedData);

        // Get current hash data to display
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
                            ->limit($currentItemsCount)
                            ->get()
                            ->toArray();

        return response(array_reverse($result), 201);

    }
}
