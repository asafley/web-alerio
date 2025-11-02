<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasUlids, HasFactory, SoftDeletes;

    protected $fillable = [
        'headline_uri',
        'slug',
        'title',
        'subtitle',
        'summary',
        'content',
        'seo_title',
        'seo_summary',
        'is_headliner',
        'published_at',
        'author_id',
        'tags',
        'author_id',
        'author_name',
        'author_uri',
    ];

    protected function casts(): array
    {
        return [
            'is_headliner' => 'boolean',
            'published_at' => 'timestamp',
            'author_id' => 'string',
        ];
    }
}
