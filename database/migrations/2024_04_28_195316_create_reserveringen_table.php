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
        Schema::create('reserveringen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('email');
            $table->string('telefoonnummer');
            $table->date('checkindate');
            $table->date('checkoutdate');
            $table->string('geboekt_huis');
            $table->integer('kamers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserveringen');
    }
};
