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
     * php artisan migrate:refresh --path=/database/migrations/2022_05_17_071324_create_email_templates_table.php
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('type', 150)->nullable();
            $table->string('subject', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('from_email', 50)->nullable();
            $table->string('from_name', 50)->nullable();
            $table->tinyInteger('is_active')->default(1)->comment('0:Inactive, 1:Active');
            $table->integer('record_updated')->length(11)->nullable();
            $table->longText('email_variables')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('email_templates');
    }
};
