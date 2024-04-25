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
        Schema::create('leasing', function (Blueprint $table) {
            $table->id()->primary()->startingValue(23);
            $table->integer('book_in_library_id')->nullable(false);
            $table->integer('librarian_id')->nullable(false);
            $table->integer('client_id')->nullable(false);
            $table->timestamp('date_of_issue')->nullable(false);
            $table->timestamp('expected_date_of_return')->nullable(false);
            $table->timestamp('actual_date_of_return')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('leasing')->insert(
            [
                'book_in_library_id' => 5,
                'librarian_id' => 2,
                'client_id' => 2,
                'date_of_issue' => '2023-08-25 11:45:16',
                'expected_date_of_return' => '2023-09-05 11:45:16',
                'actual_date_of_return' => '2023-09-06 9:26:04',
            ],
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leasing');
    }
};
