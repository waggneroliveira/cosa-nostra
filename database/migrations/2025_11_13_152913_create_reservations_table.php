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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name_complete');
            $table->string('phone_whatsapp');
            $table->integer('number_of_people');
            $table->string('email');
            $table->date('date');
            $table->time('hours');
            $table->text('message');
            $table->enum('status', ['confirmed', 'canceled', 'stand_by'])->default('stand_by');
            $table->enum('location_area', ['interna', 'varanda']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
