<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MediaModel extends Model
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = "media_models";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function media() {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }

    public function modelable(): MorphTo {  // File related to any content: games (cover), articles, galeries, consoles, ... => null if present in an article
        return $this->MorphTo();
    }
}
