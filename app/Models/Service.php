<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Concerns\HasUlids;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Service extends Model {
        use HasUlids, HasFactory, SoftDeletes;

        protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'order_num',
        'is_published',
        ];

        protected function casts()
        {
        return [
        'is_published' => 'boolean',
        ];
        }
    }
