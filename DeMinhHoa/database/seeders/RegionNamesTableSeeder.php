<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class RegionNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("regions_name")->delete();
        $faker = Faker::create();
        for( $i = 0; $i < 12; $i++ )
        {
            DB::table("regions_name")->insert([
                "name"=> $faker->lastName,
            ]);
        }
    }
}
