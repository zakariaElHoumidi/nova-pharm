<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            $table->foreignId('medecin_id');
            $table->foreignId('pharmacie_id');
            $table->foreignId('para_pharmacie_id');
            $table->foreignId('ville_id');

            $table->dateTime("date")->nullable();

            $table->dateTime("start_date")->nullable();
            $table->text("start_position_geo")->nullable();

            $table->dateTime("cancel_date")->nullable();
            $table->text("cancel_position_geo")->nullable();

            $table->dateTime("end_date")->nullable();
            $table->text("end_position_geo")->nullable();
            $table->longText("end_note")->nullable();
            $table->longText("end_photos")->nullable();

            $table->dateTime("reporter_date")->nullable();
            $table->text("reporter_position_geo")->nullable();
            $table->longText("reporter_note")->nullable();
            $table->date("reporter_next_date")->nullable();

            $table->string("etat",1)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
