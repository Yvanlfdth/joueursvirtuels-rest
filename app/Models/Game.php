<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Game extends Model
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = "games";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function forum() {
        return $this->belongsTo(Forum::class, 'game_id', 'id');
    }

    public function details() {
        return $this->hasMany(GameDetail::class, 'game_id', 'id');
    }

    public function cover(): MorphOne {
        return $this->morphMany(MediaModel::class, 'model')->where('submodel_type', 'cover');
    }
}
