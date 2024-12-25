<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'expires_at',
        'username',  // 追加
        'avatar'     // 追加
    ];

    protected $casts = [
    'expires_at' => 'datetime',
];
    // bodyと記載していたが、ER図に合わせて修正

    /**
     * スレッドに関連する投稿を取得する。
     */

    // 🐶コメント数表示のため追加
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('unexpired', function (Builder $builder) {
            $builder->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            });
        });
    }
}
