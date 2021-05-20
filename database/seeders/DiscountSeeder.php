<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("discounts")->insert([
            "name" => "RABAT20",
            "discount_amount" => 0.8,
            "active" => true,
        ]);

        DB::table("discounts")->insert([
            "name" => "RABAT30",
            "discount_amount" => 0.7,
            "active" => false,
        ]);
    }
}
