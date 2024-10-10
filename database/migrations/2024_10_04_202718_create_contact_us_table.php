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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // User's name
            $table->string('email')->nullable(); // User's email address
            $table->string('phone')->nullable(); // User's phone number
            $table->string('subject')->nullable(); // Subject of the message
            $table->text('message')->nullable(); // Message content
            // todo: add project id
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
