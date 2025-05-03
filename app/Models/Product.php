<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'card_image',
        'client_id',
        'status',
        'link',
        'user_id',
    ];

      public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    // علاقة: المنتج تم إنشاؤه بواسطة مستخدم واحد
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
