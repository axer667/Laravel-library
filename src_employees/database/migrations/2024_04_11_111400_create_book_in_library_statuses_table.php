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
        Schema::create('book_in_library_statuses', function (Blueprint $table) {
            $table->id()->primary()->startingValue(6);
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('book_in_library_statuses')->insert(
            array(
                [
                    'id' => 1,
                    'name' => 'Заказана',
                ],
                [
                    'id' => 2,
                    'name' => 'В наличии',
                ],
                [
                    'id' => 3,
                    'name' => 'Выдана на руки',
                ],
                [
                    'id' => 4,
                    'name' => 'На восстановлении',
                ],
                [
                    'id' => 5,
                    'name' => 'Помещена в архив',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_in_library_statuses');
    }
};
