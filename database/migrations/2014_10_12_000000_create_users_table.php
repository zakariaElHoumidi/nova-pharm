<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();

            $table->string('cin')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->date('date_embauche')->nullable();
            $table->date('date_naissance')->nullable();


            $table->integer('ville_id')->nullable();
            $table->integer('secteur_id')->nullable();
            $table->boolean('add_medecin_permision')->default(true);
            $table->boolean('listing_permision')->default(true);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
