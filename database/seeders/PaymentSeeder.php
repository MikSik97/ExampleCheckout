<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("payments")->insert([
            "name" => "upay",
            "type" => true,
        ]);
        DB::table("payments")->insert([
            "name" => "przy odbiorze",
            "type" => false,
        ]);
        DB::table("payments")->insert([
            "name" => "przelewy24",
            "type" => true,
        ]);
    }
}
