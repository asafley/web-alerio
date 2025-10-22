<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasUlids, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'company',
        'phone',
        'email',
        'subject',
        'body',
        'user_agent',
        'ip_address',
        'geo_json',
        'is_addressed',
        'is_emailed',
    ];

    protected function casts(): array
    {
        return [
            'is_addressed' => 'boolean',
            'is_emailed' => 'boolean',
        ];
    }
}
