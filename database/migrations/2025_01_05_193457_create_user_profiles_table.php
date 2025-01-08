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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key referencing users table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable(); // Phone number
            $table->string('address_line_1'); // Address line 1
            $table->string('address_line_2')->nullable(); // Address line 2
            $table->string('town')->nullable(); // Town
            $table->string('city'); // City
            $table->string('postal_code'); // Postal code
            $table->string('province'); // Province
            $table->text('bio')->nullable(); // Bio
            $table->string('profile_pic')->nullable(); // Profile picture
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }

};
