<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use SoftDeletes;

    protected $table = "developers";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function gameDetails(): MorphMany {
        return $this->morphMany(GameDetail::class, 'model');
    }

    public function articleTags(): MorphMany {
        return $this->morphMany(ArticleTag::class, 'model');
    }
}
