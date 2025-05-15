<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleType extends Model
{
    use SoftDeletes;

    protected $table = "article_types";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function articles() {
        return $this->hasMany(Article::class, 'article_type_id', 'id');
    }
}
