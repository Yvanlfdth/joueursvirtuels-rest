<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class UserModerator extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "user_moderators";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function modelable(): MorphTo {  // Users as moderators for: forums, articles (general, no model_id in that case)
        return $this->MorphTo();
    }
}
