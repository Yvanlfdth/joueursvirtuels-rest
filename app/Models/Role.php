<?php

namespace App\Models;

use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Guard;

class Role extends \Spatie\Permission\Models\Role
{
    protected $hidden = ["created_at", "updated_at"];

    public static $PROTECTED_ROLES = ["superadmin", "admin", "writer", "user", "guest"];

    public function members() {
        return $this->hasManyThrough('App\Models\User', 'App\Models\ModelHasRole', 'role_id', 'id', 'id', 'model_id')->where('model_type', 'App\Models\User');
    }
}
