<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('twitter_username');
            $table->string('facebook_link');
            $table->enum('ticket_type', ['walkin', 'non-walkin']);
            $table->binary('proof_of_payment')->nullable(); // Store binary image data, nullable
            $table->string('image_filename')->nullable(); // Store image filename, nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
