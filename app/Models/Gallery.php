<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Gallery extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "galleries";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function modelable(): MorphTo {  // Gallery related to any content: games, articles => null if present in an article
        return $this->MorphTo();
    }
}
