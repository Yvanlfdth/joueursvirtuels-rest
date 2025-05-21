<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class TopicLock extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "topic_locks";
    protected $hidden = ["updated_at", "deleted_at"];

    public function topic() {
        return $this->belongsTo(Topic::class, 'forum_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
