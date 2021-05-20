<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoAccSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            "country"=>"Polska",
            "city" => "Opole",
            "post_code" => '123-23',
            "street" =>"Wesoła 12/3"
        ]);
        DB::table('users')->insert([
            "email"=>"a@a.pl",
            "name"=>"Miko",
            "surname"=>"Nowak",
            "password"=> "xD",
            "address_id"=>1,
            "phone_number"=>'123456789'
            ]);
    }

}
