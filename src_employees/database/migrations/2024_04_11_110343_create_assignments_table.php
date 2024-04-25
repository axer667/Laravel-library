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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id()->primary()->startingValue(3);
            $table->integer('user_id')->nullable(false);
            $table->integer('position_id')->nullable(false);
            $table->boolean('wage_rate')->default(1.0);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('assignments')->insert(
            array(
                [
                    'id' => 1,
                    'user_id' => 1,
                    'position_id' => 1,
                ],
                [
                    'id' => 2,
                    'user_id' => 2,
                    'position_id' => 1,
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
