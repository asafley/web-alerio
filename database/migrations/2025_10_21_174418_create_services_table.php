<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Services
        Schema::create('services', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Slug - String to represent the URL-friendly version of the service name
            $table->string('slug')->unique();
            // Name - String to represent the name or title of the service
            $table->string('name');
            // Summary - Text to provide a brief overview of the service
            $table->text('summary');
            // Content - LongText to provide detailed information about the service in a dedicated page
            $table->longText('content');
            // Order Num - Integer to determine the order of the service in a list
            $table->unsignedInteger('order_num')->nullable();
            // Is Featured - Boolean to indicate whether the service is featured or not on the homepage
            $table->boolean('is_featured')->default(false);
            // Published At - Timestamp to indicate when the service is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
