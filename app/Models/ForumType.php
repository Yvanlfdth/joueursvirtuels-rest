<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumType extends Model
{
    use SoftDeletes;

    protected $table = "forum_types";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];
}
