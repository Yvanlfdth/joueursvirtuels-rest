<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createSuperAdmin();
    }

    private function createSuperAdmin() {
        $superAdminLogin = env("SUPERADMIN_LOGIN");
        $superAdminPass = env("SUPERADMIN_PASS");
        $superAdminEmail = env("SUPERADMIN_EMAIL");
        $superAdmin = User::where('login', $superAdminLogin)->first();
    	if(!$superAdmin) {
            $pw = config('app.admin_password');
            $user = new User();
            $user->login = $superAdminLogin;
            $user->email = $superAdminEmail;
            $user->password = bcrypt($superAdminPass);
            $user->save();

            $user->assignRole('superadmin');
            $user->save();
        }
    }
}
