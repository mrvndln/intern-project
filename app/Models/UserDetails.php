<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact',
        'address',
        'birthdate',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
