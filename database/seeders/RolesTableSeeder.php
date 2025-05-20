<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->setRoles();
    }

    private function setRoles() {
        $roles = config('arrays.roles');
        foreach($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}
