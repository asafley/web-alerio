<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('headline_uri');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('seo_title')->nullable();
            $table->text('seo_summary')->nullable();
            $table->boolean('is_headliner');
            $table->timestamp('published_at')->nullable();
            $table->ulid('author_id');
            $table->string('author_name')->nullable();
            $table->string('author_uri')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
