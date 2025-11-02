<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Schema for MSP Blog Posts
        Schema::create('posts', function (Blueprint $table) {
            // ID - Primary Key as ULID
            $table->ulid('id')->primary();
            // Slug - String to represent the URL-friendly version of the blog post title
            $table->string('slug')->unique();
            // Headline_URI - String to represent the URL-friendly version of the blog headline picture
            $table->string('headline_uri');
            // Title - String to represent the title or headline of the blog post
            $table->string('title');
            // Subtitle - Text to provide a brief overview of the blog post
            $table->text('subtitle')->nullable();
            // Summary - Text to provide a brief overview of the blog post for front page
            $table->text('summary')->nullable();
            // Content - LongText to provide detailed information about the blog post in a dedicated page
            $table->longText('content');
            // SEO_Title - String to represent the SEO-friendly version of the blog post title
            $table->string('seo_title')->nullable();
            // SEO_Summary - Text to provide a brief overview of the blog post for SEO
            $table->text('seo_summary')->nullable();
            // Is_Headliner - Boolean to indicate whether the blog post is a headliner or not for front page
            $table->boolean('is_headliner')->default(false);
            // Published_At - Timestamp to indicate when the blog post is published, null is not published
            $table->timestamp('published_at')->nullable();
            // Tags - JSON to represent the tags associated with the blog post
            $table->json('tags')->nullable();
            // Author - Foreign Key to the User table
            $table->ulid('author_id');
            // Author_Name - String to represent the name of the author of the blog post
            $table->string('author_name')->nullable();
            // Author_URI - String to represent the URL of the author of the blog post
            $table->string('author_uri')->nullable();
            // Timestamps - Created At and Updated At
            $table->timestamps();
            // Soft Deletes - Deleted At for soft deletion
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
