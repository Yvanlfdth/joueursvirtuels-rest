<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BanDuration extends Model
{
    use SoftDeletes;

    protected $table = "ban_durations";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function bans() {
        return $this->hasMany(GameDetail::class, 'ban_duration_id', 'id');
    }
}
