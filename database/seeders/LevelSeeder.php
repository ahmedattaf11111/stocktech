<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert([
            ["name" => "قراءة وكتابة"],
            ["name" => "جزء عم"],
            ["name" => "ثلاثة اجزاء"],
            ["name" => "القران كله"],
        ]);
    }
}
