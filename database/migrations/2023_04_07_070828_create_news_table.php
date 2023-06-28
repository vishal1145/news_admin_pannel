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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->boolean('publish_status');
            $table->bigInteger('domain_id');
            $table->bigInteger('category_id');
            $table->string('Title');
            $table->string('photos');
            $table->string('domain_name');
            $table->string('Slug');
            $table->timestamp('Date');
            $table->string('Name');
            $table->string('SubCatName');
            $table->string('youtube');
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
        Schema::dropIfExists('News');
    }
};
