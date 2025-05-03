<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'card_image',
        'status',
        'user_id',
    ];

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
