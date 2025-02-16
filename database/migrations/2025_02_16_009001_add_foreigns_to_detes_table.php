<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('detes', function (Blueprint $table) {
            $table
                ->foreign('roditelj_id')
                ->references('id')
                ->on('roditeljs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('grupa_id')
                ->references('id')
                ->on('grupas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detes', function (Blueprint $table) {
            $table->dropForeign(['roditelj_id']);
            $table->dropForeign(['grupa_id']);
        });
    }
};
