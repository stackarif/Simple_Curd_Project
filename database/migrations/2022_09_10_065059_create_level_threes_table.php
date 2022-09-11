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
        Schema::create('level_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrainded('categories')->onDelete('cascade')->nullable();
            $table->foreignId('subcategory_id')->constrainded('categories')->onDelete('cascade')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('level_threes');
    }
};
