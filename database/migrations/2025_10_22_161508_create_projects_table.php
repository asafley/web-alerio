<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Project Showcase
        Schema::create('projects', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Name - String to represent the name or title of the project
            $table->string('name');
            // Description - Text to provide a brief overview of the project
            $table->text('description');
            // Company - String to represent the name of the company the project is for
            $table->string('company');
            // Company URI - String to represent the URL of the company the project is for
            $table->string('company_uri');
            // Summary - Text to provide a brief overview of the project for front page
            $table->text('summary');
            // Content - LongText to provide detailed information about the project in a dedicated page
            $table->longText('content');
            // Slug - String to represent the URL-friendly version of the project name
            $table->string('slug')->unique();
            // Published At - Timestamp to indicate when the project is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Is Headliner - Boolean to indicate whether the project is a headliner or not for front page
            $table->boolean('is_headliner');
            // Order Num - Integer to determine the order of the project in a list
            $table->unsignedInteger('order_num')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletions
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
