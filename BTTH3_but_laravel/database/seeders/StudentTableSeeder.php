<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student;
class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for( $i = 0; $i < 10; $i++ )
        {
            Student::create([
                "tensinhvien"=> $faker->name,
                "email"=> $faker->email,
                "ngaysinh"=> $faker->date,
                "idlop"=>$faker->numberBetween(0,10)
            ]);
        }
    }
}
