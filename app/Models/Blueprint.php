<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'style_rules',
        'tone',
        'max_characters',
        'max_hashtags',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}