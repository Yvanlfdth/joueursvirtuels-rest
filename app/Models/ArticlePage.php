<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ArticlePage extends Model
{
    use SoftDeletes, Auditable;

    protected $table = "article_pages";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function article() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
