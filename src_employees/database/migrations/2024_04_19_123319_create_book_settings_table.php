<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id')->nullable(false);
            $table->integer('rental_time')->comment("Количество дней, на которое можно выдать книгу")->nullable(false)->default(5);
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_settings');
    }
};
