<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Topic extends Model
{
    use SoftDeletes, Auditable;

    protected $table = "topics";
    protected $hidden = ["updated_at", "deleted_at"];

    public function forum() {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function topicLocks() {
        return $this->hasMany(TopicLock::class, 'topic_id', 'id');
    }

    public function deletedByUser() {
        return $this->belongsTo(User::class, 'deleted_by_id', 'id');
    }
}
