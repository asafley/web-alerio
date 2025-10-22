<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Contact Form
        Schema::create('contacts', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Name - String to represent the name or title of the contact
            $table->string('name');
            // Company - String to represent the name of the company the contact works for
            $table->string('company')->nullable();
            // Phone - String to represent the phone number of the contact
            $table->string('phone')->nullable();
            // Email - String to represent the email address of the contact
            $table->string('email')->nullable();
            // Subject - String to represent the subject of the contact
            $table->string('subject')->nullable();
            // Body - Text to provide the body of the contact, typically a message or question
            $table->longText('body');
            // User Agent - LongText to represent the user agent of the contact, typically the browser or device
            $table->string('user_agent')->nullable();
            // IP Address - String to represent the IP address of the contact, typically the client's IP
            $table->string('ip_address')->nullable();
            // Geo JSON - Text to represent the geographical location of the contact, typically as a GeoJSON object
            $table->text('geo_json')->nullable();
            // Is_Addressed - Boolean to indicate whether the contact has been addressed or not
            $table->boolean('is_addressed');
            // Is_emailed - Boolean to indicate whether the contact has been emailed or not after submission
            $table->boolean('is_emailed');
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
