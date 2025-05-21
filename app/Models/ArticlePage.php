<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ArticlePage extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "article_pages";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function article() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
