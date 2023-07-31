<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');

        foreach ($comics as $item) {
            
            $comic = new Comic();

            $comic->title = $item['title'];
            $comic->description = $item['description'];
            $comic->thumb = $item['thumb'];
            $comic->cover_image = $item['cover_image'];
            $comic->thumb2 = $item['thumb2'];
            $comic->price = $item['price'];
            $comic->series = $item['series'];
            $comic->sale_date = $item['sale_date'];
            $comic->type = $item['type'];
            $comic->artists = $item['artists'];
            $comic->writers = $item['writers'];

            $comic->save();
        }
    }
}