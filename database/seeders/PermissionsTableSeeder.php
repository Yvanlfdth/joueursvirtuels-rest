<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->setPermissions();
    }

    private function setPermissions() {
        $permissions = config('arrays.permissions');
        foreach($permissions as $permission) {
            unset($permission['roles']);
            Permission::firstOrCreate($permission);
        }
    }
}
