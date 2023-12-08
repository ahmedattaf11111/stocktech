<?php

namespace Database\Seeders;

use App\Models\TestType;
use Illuminate\Database\Seeder;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestType::insert(
            [
                ["name" => "شهري"],
                ["name" => "ربع سنوي"],
                ["name" => "نصف سنوي"],
                ["name" => "سنوي"],
            ]
        );
    }
}
