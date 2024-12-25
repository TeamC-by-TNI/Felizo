<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    protected $fillable = ['stampable_type', 'stampable_id', 'stamp_type_id', 'user_id'];

    public function stampable()
    {
        return $this->morphTo();
    }

    public function stampType()
    {
        return $this->belongsTo(StampType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
