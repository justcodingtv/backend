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
            $table->uuid('uuid')->primary();

            $table->string('path', 1000);
            $table->text('extra')->nullable();
            $table->uuid('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('uuid')->on('users')->onDelete('SET NULL');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('avatar_id')->references('uuid')->on('images')->onDelete('SET NULL');
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
