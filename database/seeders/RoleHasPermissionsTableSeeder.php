<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->setRoleHasPermissions();
    }

    private function setRoleHasPermissions() {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $allRoles = Role::all();
        $superAdmin = Role::query()->where('name', '=', 'superadmin')->first();

        foreach($allRoles as $role) {
            $role->syncPermissions();
        }

        $permissionsDB = Permission::all();
        $permissions = config('arrays.permissions');
        foreach($permissionsDB as $permissionDB) {
            $this->givePermissionRole($superAdmin, $permissionDB); // superadmin have all permissions
            $key = array_search($permissionDB->name, array_column($permissions, 'name'));
            if($key !== false) {    // false = not found
                $permission = $permissions[$key];
                $roles = $permission['roles'];
                if(!empty($roles)) {
                    if($roles[0] == "%") {  // means all roles
                        $this->givePermissionAllRoles($allRoles, $permissionDB);
                    }
                    else {
                        foreach($roles as $role) {
                            $this->givePermissionRole($role, $permissionDB);
                        }
                    }
                }
            }
        }
    }

    private function givePermissionAllRoles($allRoles, $permission) {
        foreach($allRoles as $role) {
            $this->givePermissionRole($role, $permission);
        }
    }

    private function givePermissionRole($role, $permission) {
        if(!$role->hasPermissionTo($permission)) {
            $role->permissions()->attach($permission);
        }
    }
}
