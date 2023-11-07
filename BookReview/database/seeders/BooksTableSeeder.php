<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use Illuminate\Support\Facades\File;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        Book::query()->delete();
        for($i=0;$i<10;$i++)
        {
            $img= $faker->randomElement(File::allFiles(public_path("img")));
            $img= str_replace(public_path(""),"",$img);
            Book::create([
                "Title"=> $faker->title,
                "Author"=> $faker->firstName,
                "Genre"=>$faker->sentence(6),
                "PublicationYear"=>$faker->year,
                "ISBN"=> $faker->numberBetween(1,10),
                "CoverImageURL"=>$img,
            ]);
        }
    }
}
