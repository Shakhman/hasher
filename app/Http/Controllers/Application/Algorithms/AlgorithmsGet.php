<?php

namespace App\Http\Controllers\Application\Algorithms;

use App\Algorithm;
use App\Http\Controllers\Controller;

class AlgorithmsGet extends Controller
{
    public function __invoke()
    {
        $result = Algorithm::select('id', 'name')->get();

        return response($result, 200);
    }
}
