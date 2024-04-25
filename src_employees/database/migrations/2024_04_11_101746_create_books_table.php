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
        Schema::create('books', function (Blueprint $table) {
            $table->id()->startingValue(21);;
            $table->integer('author_id')->nullable(false);
            $table->integer('issue_year')->nullable();
            $table->string("title")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('books')->insert(
            array(
                [
                    'id' => 1,
                    'author_id' => 1,
                    'issue_year' => 1867,
                    'title' => 'Война и мир',
                ],
                [
                    'id' => 2,
                    'author_id' => 1,
                    'issue_year' => 1878,
                    'title' => 'Анна Каренина',
                ],
                [
                    'id' => 3,
                    'author_id' => 1,
                    'issue_year' => 1852,
                    'title' => 'Детство',
                ],
                [
                    'id' => 4,
                    'author_id' => 1,
                    'issue_year' => 1886,
                    'title' => 'Смерть Ивана Ильича',
                ],

                [
                    'id' => 5,
                    'author_id' => 2,
                    'issue_year' => 1918,
                    'title' => 'Двенадцать',
                ],
                [
                    'id' => 6,
                    'author_id' => 2,
                    'issue_year' => 1912,
                    'title' => 'Ночь, улица, фонарь, аптека',
                ],
                [
                    'id' => 7,
                    'author_id' => 2,
                    'issue_year' => 1907,
                    'title' => 'Незнакомка',
                ],
                [
                    'id' => 8,
                    'author_id' => 2,
                    'issue_year' => 1918,
                    'title' => 'Скифы',
                ],

                [
                    'id' => 9,
                    'author_id' => 3,
                    'issue_year' => 1840,
                    'title' => 'Герой нашего времени',
                ],
                [
                    'id' => 10,
                    'author_id' => 3,
                    'issue_year' => 1840,
                    'title' => 'Мцыри',
                ],
                [
                    'id' => 11,
                    'author_id' => 3,
                    'issue_year' => 1837,
                    'title' => 'Смерть поэта',
                ],
                [
                    'id' => 12,
                    'author_id' => 3,
                    'issue_year' => 1837,
                    'title' => 'Бородино',
                ],

                [
                    'id' => 13,
                    'author_id' => 4,
                    'issue_year' => 1842,
                    'title' => 'Мертвые души',
                ],
                [
                    'id' => 14,
                    'author_id' => 4,
                    'issue_year' => 1842,
                    'title' => 'Шинель',
                ],
                [
                    'id' => 15,
                    'author_id' => 4,
                    'issue_year' => 1835,
                    'title' => 'Тарас Бульба',
                ],
                [
                    'id' => 16,
                    'author_id' => 4,
                    'issue_year' => 1836,
                    'title' => 'Нос',
                ],

                [
                    'id' => 17,
                    'author_id' => 5,
                    'issue_year' => 1836,
                    'title' => 'Капитанская дочка',
                ],
                [
                    'id' => 18,
                    'author_id' => 5,
                    'issue_year' => 1835,
                    'title' => 'Сказка о рыбаке и рыбке',
                ],
                [
                    'id' => 19,
                    'author_id' => 5,
                    'issue_year' => 1831,
                    'title' => 'Сказка о царе Салтане',
                ],
                [
                    'id' => 20,
                    'author_id' => 5,
                    'issue_year' => 1820,
                    'title' => 'Руслан и Людмила',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
