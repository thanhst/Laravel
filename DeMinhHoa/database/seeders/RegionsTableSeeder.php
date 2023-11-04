<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('regions')->delete();
        $faker=Faker::create();
        $flower_ids=DB::table('flowers')->pluck('id')->toArray();
        $region_names=DB::table('regions_name')->pluck('name')->toArray();
        for($i=0;$i<20;$i++)
        {
            Region::create([
                'flower_id'=>$faker->randomElement($flower_ids),
                'region_name'=>$faker->randomElement($region_names),
            ]);
        }
    }
}
