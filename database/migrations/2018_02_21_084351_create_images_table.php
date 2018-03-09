<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();

            $table->string('path', 1000);
            $table->text('extra')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('avatar_id')->references('id')->on('images')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Drops the avatar_id foreign on the users table
         * Prevents error
         * */
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_avatar_id_foreign');
        });

        Schema::dropIfExists('images');
    }
}
