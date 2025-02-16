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
        Schema::create('prijavas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime_dete');
            $table->string('prezime_dete');
            $table->date('datum_rodjenja');
            $table->string('jmbg_dete');
            $table->string('ime_roditelj');
            $table->string('prezime_roditelj');
            $table->string('broj_telefona');
            $table->string('jmbg_roditelj');
            $table->text('napomene')->nullable();
            $table->date('datum_prijave');
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->string('status')->default('nepotvrdjen');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prijavas');
    }
};
