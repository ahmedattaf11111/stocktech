<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("12345678"),
            "type" => "admin"
        ]);
        Permission::create(
            ["name" => "super admin", "guard_name" => "admin"],
        );
        $user->givePermissionTo("super admin");
    }
}
