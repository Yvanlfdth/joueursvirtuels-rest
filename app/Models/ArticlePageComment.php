<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ArticlePageComment extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "article_page_comments";
    protected $hidden = ["updated_at", "deleted_at"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deletedByUser() {
        return $this->belongsTo(User::class, 'deleted_by_user_id', 'id');
    }

    public function articlePage() {
        return $this->belongsTo(ArticlePage::class, 'article_page_id', 'id');
    }
}
