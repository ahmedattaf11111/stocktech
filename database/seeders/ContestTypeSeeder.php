<?php

namespace Database\Seeders;

use App\Models\ContestType;
use Illuminate\Database\Seeder;

class ContestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContestType::insert(
            [
                ["name" => "مسابقة داخل الدار"],
                ["name" => "داخل المدينة"],
                ["name" => "داخل الدولة"],
                ["name" => "دولية"],
            ]
        );
    }
}
