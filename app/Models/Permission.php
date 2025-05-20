<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function exist($names): bool {
        if(!is_array($names)) {
            $names = [$names];
        }

        return Permission::query()->whereIn('name', $names)->count() > 0;
    }
}
