<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // New fields
            $table->string('title');               // Property title (town)
            $table->string('province');            // Property province
            $table->integer('bedrooms');           // Number of bedrooms
            $table->integer('bathrooms');          // Number of bathrooms
            $table->integer('garage');             // Number of garages
            $table->string('room_type');           // Room type (e.g., backyard room, shared house)
            $table->json('amenities')->nullable(); // Property amenities (Wi-Fi, parking, etc.)
            $table->string('image_1')->nullable(); // Column to store first image path
            $table->string('image_2')->nullable(); // Column to store second image path
            $table->string('image_3')->nullable(); // Column to store third image path
            $table->string('image_4')->nullable(); // Column to store fourth image path
            $table->string('image_5')->nullable(); // Column to store fifth image path
            $table->string('image_6')->nullable(); // Column to store sixth image path
            $table->decimal('price', 10, 2);       // Property price
            $table->enum('availability', ['Available', 'Taken'])->default('Available');
            $table->date('available_date');        // Property availability date
            $table->text('description')->nullable(); // Property description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
