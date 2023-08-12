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
        Schema::create('header_news', function (Blueprint $table) {
            $table->id();
            $table->string('display_title');
            $table->boolean('publish_status')->nullable();
            $table->bigInteger('domain_id');
            $table->bigInteger('category_id');
            $table->string('Title');
            $table->string('photos');
            $table->string('domain_name')->nullable();
            $table->string('Slug');
            $table->timestamp('Date');
            $table->string('Name')->nullable();
            $table->string('SubCatName')->nullable();
            $table->string('youtube')->nullable();
            $table->json('tags')->nullable();
            $table->boolean('Display_in_front');
            $table->longText('Content');
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
        Schema::dropIfExists('header_news');
    }
};
