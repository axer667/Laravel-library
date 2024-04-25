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
        DB::statement($this->dropView());
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement($this->dropView());
    }


    private function dropView(): string
    {
        return <<<SQL
           DROP VIEW IF EXISTS `books_count_in_library`;
           SQL;
    }

    private function createView(): string
    {
        return <<<SQL
           CREATE VIEW `books_count_in_library` AS
           SELECT
                count(b.id) AS `count`,
                b.title
            FROM
                books_in_library bil INNER JOIN
                    books b on bil.book_id = b.id
            WHERE
                bil.status_id = 2 AND
                b.deleted_at IS NULL AND
                bil.deleted_at IS NULL
            GROUP BY
                b.id
           SQL;
    }
};

