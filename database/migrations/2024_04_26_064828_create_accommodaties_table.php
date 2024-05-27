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
        Schema::create('accommodaties', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->text('omschrijving');
            $table->string('afbeelding_url');
            $table->double('prijs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodaties');
    }
};
