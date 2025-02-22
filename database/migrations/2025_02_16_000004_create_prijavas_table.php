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
            $table->string('jmbg_dete', 13);
            $table->string('ime_roditelj');
            $table->string('prezime_roditelj');
            $table->string('broj_telefona');
            $table->string('jmbg_roditelj', 13);
            $table->text('napomene')->nullable();
            $table->date('datum_prijave');
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->enum('status', ['nepotvrdjen', 'potvrdjen', 'odbijen', 'ispisan'])->default('nepotvrdjen');

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
