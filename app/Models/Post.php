<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // 追加💡
    protected $fillable = ['thread_id', 'content', 'username', 'avatar'];
    // 追加💡
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
    
    public function stamps()
    {
        return $this->hasMany(Stamp::class);
    }
}
