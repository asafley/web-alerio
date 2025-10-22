<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasUlids, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'company',
        'company_uri',
        'summary',
        'content',
        'slug',
        'published_at',
        'is_headliner',
        'order_num',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'timestamp',
            'is_headliner' => 'boolean',
        ];
    }
}
