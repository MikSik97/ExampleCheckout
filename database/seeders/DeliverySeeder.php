<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("deliveries")->insert([
            "name" => "DPD za pobraniem",
            "price" => 21.99,
            "type" => false,
        ]);
        DB::table("deliveries")->insert([
            "name" => "DPD",
            "price" => 17.99,
            "type" => true,
        ]);
        DB::table("deliveries")->insert([
            "name" => "Paczkomat inpost",
            "price" => 16.99,
            "type" => true,
        ]);
    }
}
