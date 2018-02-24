<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectHasLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_has_language', function (Blueprint $table) {
            $table->uuid('project_id');
            $table->uuid('language_id');

            $table->foreign('project_id')->references('uuid')->on('projects')->onDelete('cascade');
            $table->foreign('language_id')->references('uuid')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_has_language');
    }
}
