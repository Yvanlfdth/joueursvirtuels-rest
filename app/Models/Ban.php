<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Ban extends Model
{
    use SoftDeletes, Auditable;

    protected $table = "bans";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bannedByUser() {
        return $this->belongsTo(User::class, 'banned_by_user_id', 'id');
    }

    public function banDuration() {
        return $this->belongsTo(BanDuration::class, 'ban_duration_id', 'id');
    }

    public function modelable(): MorphTo {  // Ban requested on: posts, article_comments
        return $this->MorphTo();
    }
}
