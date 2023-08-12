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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('domain_id');
            $table->string('Name');
            $table->string('Image')->nullable();
            $table->string('slug');
            $table->string('Desc')->nullable();
            $table->boolean('Display_in_home');
            $table->boolean('Display_in_header');
            $table->boolean('Display_in_top_nav');
            $table->string('Display_in_layout');
            $table->string('Display_in_Home_Rank');

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
        Schema::dropIfExists('categories');
    }
};
