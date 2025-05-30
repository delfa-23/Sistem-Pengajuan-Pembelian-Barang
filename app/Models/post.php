<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->user_id = auth()->user()->id;
        });

        static::updating(function ($post) {
            $post->user_id = 1;
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
