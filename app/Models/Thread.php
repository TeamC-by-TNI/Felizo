<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'expires_at'
    ];

    protected $dates = [
        'expires_at'
    ];

    /**
     * スレッドに関連する投稿を取得する。
     */

    // 🐶コメント数表示のため追加
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
