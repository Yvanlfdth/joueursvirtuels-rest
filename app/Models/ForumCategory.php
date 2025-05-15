<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumCategory extends Model
{
    use SoftDeletes;

    protected $table = "forum_categories";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function forumType() {
        return $this->belongsTo(ForumType::class, 'forum_type_id', 'id');
    }
}
