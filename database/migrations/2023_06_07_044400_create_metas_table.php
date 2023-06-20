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
            $table->string('facebook');
            $table->string('favicon');
            $table->string('desc');
            $table->string('twitter');
            $table->string('image');
            $table->string('author');
            $table->string('instagram');
            $table->string('title');
            $table->string('keyword');
            $table->string('pinterest');
            $table->string('youtube');
            $table->string('punchline');
            $table->string('punchdesc');
            $table->string('punchlogo');
            $table->string('design');
            $table->string('company');
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
