<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Testimonials from current and past customers
        Schema::create('testimonials', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Name - String to represent the name or title of the customer
            $table->string('name');
            // Title - String to represent the job title of the customer
            $table->string('title')->nullable();
            // Company - String to represent the name of the company the customer works for
            $table->string('company');
            // Company URI - String to represent the URL of the company the customer works for
            $table->string('company_uri')->nullable();
            // Content - Text to provide a brief overview of the customer's experience
            $table->text('content');
            // Order Num - Integer to determine the order of the customer in a list
            $table->unsignedInteger('order_num')->nullable();
            // Published At - Timestamp to indicate when the customer's testimonial is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
