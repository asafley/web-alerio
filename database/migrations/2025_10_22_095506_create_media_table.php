<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Media
        Schema::create('media', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Public URI - String to represent the URL of the media file
            $table->string('public_uri');
            // Private URI - String to represent the URL of the media file on disk or object storage
            $table->string('private_uri');
            // Type - String to represent the type of media file, e.g., image, video, audio, document, etc.
            $table->string('type');
            // Is Public - Boolean to indicate whether the media file is public or private
            $table->boolean('is_public');
            // Alt Text - String to provide alternative text for the media file, if applicable
            $table->string('alt_text')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
