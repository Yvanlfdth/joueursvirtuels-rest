<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = "countries";
    protected $hidden = ["created_at", "updated_at", "deleted_at"];

    public function users() {
        return $this->hasMany(User::class, 'country_id', 'id');
    }

    public function gameReleases() {
        return $this->hasMany(User::class, 'country_id', 'id');
    }
}
