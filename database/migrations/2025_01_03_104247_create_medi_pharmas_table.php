<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medi_pharmas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable();
            $table->foreignId('administrateur_id')->nullable();

            $table->string('type_entity', 1)->default(1);
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->text('adresse')->nullable();
            $table->integer('secteur')->nullable();
            $table->integer('ville')->nullable();
            $table->integer('speciality')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('phones')->nullable();
            $table->text('emails')->nullable();
            $table->text('photos')->nullable();

            $table->string('type_medecin', 1)->nullable();
            $table->string('potentiel_medecin', 1)->nullable();

            $table->string('etat', 1)->default(0);

            $table->timestamps();
        });
    }
};
