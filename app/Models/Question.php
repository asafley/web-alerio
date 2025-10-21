<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasUlids, HasFactory, SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'order_num',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'timestamp',
        ];
    }
}
