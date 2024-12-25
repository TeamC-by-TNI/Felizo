<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StampType extends Model
{
    /** @use HasFactory<\Database\Factories\StampTypesFactory> */
    use HasFactory;

    // 追加💡
    protected $fillable = ['name', 'icon_path'];

    
    // 追加💡
    // このスタンプタイプが使用されているスタンプを取得する。
    public function stamps()
    {
        return $this->hasMany(Stamp::class);
    }
}
