<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blueprint_id',
        'contenu_brut',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blueprint()
    {
        return $this->belongsTo(Blueprint::class);
    }
}