<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Article extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "articles";
    protected $hidden = ["updated_at", "deleted_at"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function type() {
        return $this->belongsTo(ArticleType::class, 'article_type_id', 'id');
    }

    public function tags() {
        return $this->hasMany(ArticleTag::class, 'article_id', 'id');
    }
}
