<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->string('domain_id');
            $table->string('facebook')->nullable();
            $table->string('favicon')->nullable();
            $table->string('desc')->nullable();
            $table->string('twitter');
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->string('instagram')->nullable();
            $table->string('title');
            $table->string('keyword')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('youtube')->nullable();
            $table->string('punchline')->nullable();
            $table->string('punchdesc')->nullable();
            $table->string('punchlogo')->nullable();
            $table->string('who_we_are')->nullable();
            $table->string('design')->nullable();
            $table->string('company')->nullable();
            $table->string('how_we_help')->nullable();
            $table->string('privacy');
            $table->string('terms');
            $table->string('facebook_id')->nullable();
            $table->string('analytics_id')->nullable();
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
        Schema::dropIfExists('metas');
    }
};
