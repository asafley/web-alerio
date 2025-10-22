<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Settings for website
        Schema::create('settings', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Key - String to represent the key of the setting
            $table->string('key')->unique();
            // Value - String to represent the value of the setting
            $table->string('value')->nullable();
            // Type - String to represent the type of the setting
            $table->string('type')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
