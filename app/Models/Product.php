<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'price',
        'description',
        'published',
        'published_at',
        'deleted',
        'user_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'published_at' => 'datetime',
        'enabled' => 'boolean',
    ];

    protected $dates = ['published_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
