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
        Schema::create('authors', function (Blueprint $table) {
            $table->id()->startingValue(6);
            $table->string("first_name");
            $table->string("last_name");
            $table->string("patronymic");
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('authors')->insert(
            array(
                [
                    'id' => 1,
                    'first_name' => 'Лев',
                    'last_name' => 'Толстой',
                    'patronymic' => 'Николаевич',
                ],
                [
                    'id' => 2,
                    'first_name' => 'Александр',
                    'last_name' => 'Блок',
                    'patronymic' => 'Александрович',
                ],
                [
                    'id' => 3,
                    'first_name' => 'Михаил',
                    'last_name' => 'Лермонтов',
                    'patronymic' => 'Юрьевич',
                ],
                [
                    'id' => 4,
                    'first_name' => 'Николай',
                    'last_name' => 'Гоголь',
                    'patronymic' => 'Васильевич',
                ],
                [
                    'id' => 5,
                    'first_name' => 'Александр',
                    'last_name' => 'Пушкин',
                    'patronymic' => 'Сергеевич',
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
