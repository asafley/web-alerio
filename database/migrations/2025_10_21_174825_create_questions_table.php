<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP FAQ
        Schema::create('questions', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Question - String to represent the question or topic
            $table->string('question');
            // Answer - Text to provide the answer to the question
            $table->text('answer');
            // Order Number - Integer to represent the order of the question in the FAQ
            $table->unsignedInteger('order_num')->nullable();
            // Published At - Timestamp to indicate when the question is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
