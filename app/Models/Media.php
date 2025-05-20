<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Media extends Model
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = "medias";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function model() {
        return $this->hasOne(MediaModel::class, 'media_id', 'id');
    }
}
