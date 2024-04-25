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
           DROP VIEW IF EXISTS `books_on_lease`;
           SQL;
    }

    private function createView(): string
    {
        return <<<SQL
           CREATE VIEW `books_on_lease` AS
           SELECT
                l.id,
                b.id AS book_id,
                b.title AS book_title,
                u.id AS librarian_id,
                CONCAT(u.last_name, ' ', LEFT(u.first_name, 1), '.', IF (u.patronymic IS NOT NULL, CONCAT(LEFT(u.patronymic, 1), '.'), '')) AS librarian_name,
                cl.id AS client_id,
                cl.name AS client_name,
                l.date_of_issue,
                l.expected_date_of_return,
                l.actual_date_of_return
           FROM
                leasing l INNER JOIN
                    books_in_library bil on l.book_in_library_id = bil.id INNER JOIN
                    books b on bil.book_id = b.id INNER JOIN
                    users u on l.librarian_id = u.id INNER JOIN
                    clients cl on l.client_id = cl.id
           WHERE
                l.deleted_at IS NULL AND
                bil.deleted_at IS NULL  AND
                b.deleted_at IS NULL
           SQL;
    }
};
