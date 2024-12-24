<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    /** @use HasFactory<\Database\Factories\StampFactory> */
    use HasFactory;
    protected $fillable = ['post_id', 'stamp_type_id'];

    /**
     * スタンプが関連する投稿を取得する。
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * スタンプが属するスタンプタイプを取得する。
     */
    public function stampType()
    {
        return $this->belongsTo(StampType::class);
    }
}
