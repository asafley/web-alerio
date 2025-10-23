<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Partners
        Schema::create('partners', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Company - String to represent the name of the company
            $table->string('company');
            // Company URI - String to represent the URL of the company
            $table->string('company_uri')->nullable();
            // Logo URI - String to represent the URL of the company's logo'
            $table->string('logo_uri');
            // Description - Text to provide a brief overview of the company's services or products'
            $table->text('description')->nullable();
            // Order Num - Integer to determine the order of the company in a list
            $table->unsignedInteger('order_num')->nullable();
            // Published At - Timestamp to indicate when the company is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
