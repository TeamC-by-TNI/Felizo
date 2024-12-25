<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // 追加💡
    protected $fillable = ['thread_id', 'content', 'username', 'avatar', 'expires_at'];
    // 追加💡
    protected $dates = ['created_at', 'updated_at', 'expires_at'];
    // 追加💡
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    // 🐶スタンプのために以下を追加
    public function stamps()
    {
        return $this->morphMany(Stamp::class, 'stampable');
    }
}
