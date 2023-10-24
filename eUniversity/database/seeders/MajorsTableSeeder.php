<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Major;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('majors')->delete();
        $faker=Faker::create();
        for($i=0;$i<30;$i++)
        {
            Major::create([
                'name'=> $faker->name,
                'description'=>$faker->paragraph(1),
                'duration'=>$faker->numberBetween(1,6),
            ]);
        }
    }
}
