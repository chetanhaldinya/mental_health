<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatagoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * php artisan migrate:refresh --path=/database/migrations/2021_12_10_052559_create_catagories_table.php
     */
    public function up()
    {
        Schema::create('catagories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('catagories');
    }
}
