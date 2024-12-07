<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        "channel_name",
        "url",
        "user_id"
    ];
    public function video()
    {
        return $this->hasMany(Video::class);
    }
}
