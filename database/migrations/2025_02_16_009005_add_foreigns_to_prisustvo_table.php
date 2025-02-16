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
        Schema::table('prisustvo', function (Blueprint $table) {
            $table
                ->foreign('evidencija_id')
                ->references('id')
                ->on('evidencijas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('dete_id')
                ->references('id')
                ->on('detes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prisustvo', function (Blueprint $table) {
            $table->dropForeign(['evidencija_id']);
            $table->dropForeign(['dete_id']);
        });
    }
};
