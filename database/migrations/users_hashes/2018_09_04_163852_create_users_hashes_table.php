<?php

use App\Database\BaseMigration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersHashesTable extends BaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_hashes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->references()->on('users');
            $table->integer('algorithm_id')->references()->on('algorithms');
            $table->integer('vocabulary_id')->references()->on('vocabularies');
            $table->string('hash');

            $this->timestamps($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_hashes');
    }
}
