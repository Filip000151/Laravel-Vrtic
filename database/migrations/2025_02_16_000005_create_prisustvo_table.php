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
        Schema::create('prisustvo', function (Blueprint $table) {
            $table->foreignId('evidencija_id');
            $table->foreignId('dete_id');
            $table->enum('status', ['odsutan', 'prisutan', 'opravdano'])->default('odsutan');
            $table->text('napomena')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prisustvo');
    }
};
