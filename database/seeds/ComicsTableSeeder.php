<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $new_comic = new Comic;
            $new_comic->title = $comic->title;
            $new_comic->slug = Str::slug($comic->title, '-');
            $new_comic->image = $comic->image;
            $new_comic->type = $comic->type;
            $new_comic->save();
        }
    }
}
