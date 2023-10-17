<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Book;
use Faker\Factory as Faker;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Faker::create();
        DB::table('books')->delete();
        $author_ids=Author::all()->pluck('id')->toArray();
        for($i =0;$i<50;$i++)
        {
            Book::create([
                'author_id'=>$faker->randomElement($author_ids),
                'title'=> $faker->sentence(5),
            ]);
        }
    }
}
