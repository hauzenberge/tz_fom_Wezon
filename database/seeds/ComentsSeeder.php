<?php

use Illuminate\Database\Seeder;

class ComentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= (count(App\News::all()) * 10) ; $i++) { 
            App\Coments::create([
                'user_name' => 'user'.$i, 
                'news_id' => rand(1, count(App\News::all())), 
                'status' => 'published', 
                'body' => 'Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).'
            ]);
        }
    }
}
