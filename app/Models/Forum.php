<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Forum extends Model
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = "forums";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function forumCategory() {
        return $this->belongsTo(ForumCategory::class, 'forum_category_id', 'id');
    }

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function topics() {
        return $this->hasMany(Topic::class, 'forum_id', 'id');
    }
}
