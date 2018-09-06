<?php

namespace App\Console\Commands;

use App\User;
use App\UsersHash;
use App\Vocabulary;
use Illuminate\Console\Command;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Support\Facades\File;

class ParseUsersInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse users info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = [];

        dump('Start parsing users');

        $result['users'] = User::get()->toArray();

        if (empty($result['users'])) {
            dump('no users in db');
            return;
        }

        foreach ($result['users'] as $key => $user) {
            $result['users'][$key]['hashes'] = UsersHash::select([
                'users_hashes.id',
                'users_hashes.hash',
                'algorithms.name as algo',
                'vocabularies.word as origin_word',
            ])
            ->where('users_hashes.user_id', $user['id'])
            ->leftJoin('algorithms', 'algorithms.id', 'users_hashes.algorithm_id')
            ->leftJoin('vocabularies', 'vocabularies.id', 'users_hashes.vocabulary_id')
            ->orderBy('users_hashes.id', 'desc')
            ->get()
            ->toArray();

            if (!empty($result['users'][$key]['hashes'])) {
                foreach ($result['users'][$key]['hashes'] as $k => &$hash) {
                    $hash['similar_words'] = Vocabulary::select([
                        'word'
                    ])
                    ->where('word', 'LIKE', '%' . $hash['origin_word'] . '%')
                    ->where('word', '!=', $hash['origin_word'])
                    ->get()
                    ->toArray();
                }
            }
        }

        $xml = ArrayToXml::convert($result);

        File::put(storage_path().'/users.xml', $xml);

        dump('Complete');
    }
}
