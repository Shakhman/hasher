<?php

namespace App\Http\Controllers\Application\Vocabularies;

use App\Vocabulary;
use App\Http\Controllers\Controller;

class VocabulariesGet extends Controller
{
    public function __invoke()
    {
        $result = Vocabulary::select('id', 'word')->get();

        return response($result, 200);
    }
}
