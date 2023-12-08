<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "email" => "admin@admin.com",
            "password" => "123456"
        ]);
        $this->call(LevelSeeder::class);
        $this->call(ContestTypeSeeder::class);
        $this->call(TestTypeSeeder::class);
    }
}
