<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books_in_library', function (Blueprint $table) {
            $table->id()->primary()->startingValue(23);
            $table->integer('book_id')->nullable(false);
            $table->integer('status_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('books_in_library')->insert(
            array(
                [
                    'id' => 1,
                    'book_id' => 1,
                    'status_id' => 1,
                ],
                [
                    'id' => 2,
                    'book_id' => 1,
                    'status_id' => 2,
                ],
                [
                    'id' => 3,
                    'book_id' => 1,
                    'status_id' => 2,
                ],
                [
                    'id' => 4,
                    'book_id' => 2,
                    'status_id' => 2,
                ],
                [
                    'id' => 5,
                    'book_id' => 3,
                    'status_id' => 2,
                ],
                [
                    'id' => 6,
                    'book_id' => 4,
                    'status_id' => 2,
                ],
                [
                    'id' => 7,
                    'book_id' => 5,
                    'status_id' => 2,
                ],
                [
                    'id' => 8,
                    'book_id' => 6,
                    'status_id' => 2,
                ],
                [
                    'id' => 9,
                    'book_id' => 7,
                    'status_id' => 2,
                ],
                [
                    'id' => 10,
                    'book_id' => 8,
                    'status_id' => 2,
                ],
                [
                    'id' => 11,
                    'book_id' => 9,
                    'status_id' => 2,
                ],
                [
                    'id' => 12,
                    'book_id' => 10,
                    'status_id' => 2,
                ],
                [
                    'id' => 13,
                    'book_id' => 11,
                    'status_id' => 2,
                ],
                [
                    'id' => 14,
                    'book_id' => 12,
                    'status_id' => 2,
                ],
                [
                    'id' => 15,
                    'book_id' => 13,
                    'status_id' => 2,
                ],
                [
                    'id' => 16,
                    'book_id' => 14,
                    'status_id' => 2,
                ],
                [
                    'id' => 17,
                    'book_id' => 15,
                    'status_id' => 2,
                ],
                [
                    'id' => 18,
                    'book_id' => 16,
                    'status_id' => 2,
                ],
                [
                    'id' => 19,
                    'book_id' => 17,
                    'status_id' => 2,
                ],
                [
                    'id' => 20,
                    'book_id' => 18,
                    'status_id' => 2,
                ],
                [
                    'id' => 21,
                    'book_id' => 19,
                    'status_id' => 2,
                ],
                [
                    'id' => 22,
                    'book_id' => 20,
                    'status_id' => 2,
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_in_library');
    }
};
