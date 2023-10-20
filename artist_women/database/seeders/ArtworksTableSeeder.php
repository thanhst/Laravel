<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artwork;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\File;
class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $arr=['Painting',"Music","Literature"];
        Artwork::query()->delete();
        for($i=0;$i<10;$i++)
        {
            $img= $faker->randomElement( File::allFiles(public_path('img')));
            $img= str_replace(public_path(),"",$img);
            Artwork::create([
                "artist_name"=> $faker->name,
                "description"=> $faker->paragraph(1),
                "art_type"=> $faker->randomElement($arr),
                "media_link"=> $faker->url,
                "cover_img"=> $img,
            ]);
        }

    }
}
