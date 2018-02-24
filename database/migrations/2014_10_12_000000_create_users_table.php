<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->uuid('avatar_id')->nullable();
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');

            $table->string('email')->unique();
            $table->string('password');

            $table->text('options')->nullable();
            $table->text('extra')->nullable();

            $table->timestamp('banned_at')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
