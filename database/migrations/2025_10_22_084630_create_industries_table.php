<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Industries served
        Schema::create('industries', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Vertical - String to represent the name or title of the industry
            $table->string('vertical');
            // Headline - Text to provide a brief overview of the industry
            $table->text('headline');
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};
