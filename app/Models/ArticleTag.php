<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ArticleTag extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $table = "article_tags";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function article() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
    
    public function modelable(): MorphTo {  // Anything that can be related to an article: game_mods, game_kinds, games, developers, editors, consoles, another article
        return $this->MorphTo();
    }
}
