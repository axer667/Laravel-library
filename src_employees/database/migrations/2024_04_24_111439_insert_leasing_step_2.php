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
        DB::table('leasing')->insert(
            array(
                [
                    'book_in_library_id' => 2,
                    'librarian_id' => 1,
                    'client_id' => 1,
                    'date_of_issue' => '2023-10-02 09:30:31',
                    'expected_date_of_return' => '2023-10-12 09:30:31'
                ],
                [
                    'book_in_library_id' => 3,
                    'librarian_id' => 1,
                    'client_id' => 2,
                    'date_of_issue' => '2023-10-02 10:35:26',
                    'expected_date_of_return' => '2023-10-12 10:35:26'
                ],
                [
                    'book_in_library_id' => 4,
                    'librarian_id' => 1,
                    'client_id' => 2,
                    'date_of_issue' => '2023-10-04 12:45:16',
                    'expected_date_of_return' => '2023-10-14 12:45:16'
                ],
                [
                    'book_in_library_id' => 5,
                    'librarian_id' => 2,
                    'client_id' => 1,
                    'date_of_issue' => '2023-09-25 11:45:16',
                    'expected_date_of_return' => '2023-10-01 11:45:16'
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
