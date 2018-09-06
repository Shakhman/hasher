<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersHash extends Model
{
    protected $table = 'users_hashes';

    protected $guarded = ['id'];
}
