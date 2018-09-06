<?php

namespace App\Helpers;

class HashWordsHelper
{
    private $algorithms = null;
    private $words = null;
    private $userId = null;

    private $result = [];

    public function __invoke(array $data, int $userId)
    {
        $this->algorithms = $data['algorithms'];
        $this->words = $data['words'];
        $this->userId = $userId;

        return $this->handler();
    }

    private function handler()
    {
        foreach ($this->words as $word) {
            foreach ($this->algorithms as $algorithm) {
                $hash = $this->hasher($word['name'], $algorithm['name']);
                $this->result[] = [
                   'hash' => $hash,
                   'algorithm_id' => $algorithm['id'],
                   'vocabulary_id' => $word['id'],
                   'user_id' => $this->userId,
                ];
            }
        }

        return $this->result;
    }

    private function hasher(string $word, string $algo)
    {
        return hash($algo, $word);
    }
}
