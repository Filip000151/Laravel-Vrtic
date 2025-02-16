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
        Schema::create('roditeljs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime');
            $table->string('prezime');
            $table->string('broj_telefona');
            $table->string('jmbg', 13)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roditeljs');
    }
};
