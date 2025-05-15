<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class GameDetail extends Model
{
    use SoftDeletes, Auditable;

    protected $table = "game_details";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function game() {
        return $this->belongsTo(Game::class, 'forum_id', 'id');
    }

    public function modelable(): MorphTo {  // Game details: game_mods, game_kinds, developers, editors, consoles
        return $this->MorphTo();
    }
}
