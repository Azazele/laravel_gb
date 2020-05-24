<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getDataNews());
        DB::table('cats')->insert($this->getDataCats());
        DB::table('cat_relations')->insert($this->getDataCatRelations());
        DB::table('news_sources')->insert($this->getDataSources());
    }

    public function getDataNews ()
    {
        $faker = Faker\Factory::create('ru_RU');
        $date = date_create();
        $date = date_format($date, 'Y-m-d H:i:s');

        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(1,3)),
                'content' => $faker->realText(rand(150,250)),
                'img' => "https://loremflickr.com/500/500?$i",
                'created_at' => $date
            ];
        }
        return $data;
    }

    public function getDataCats ()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(1,3)),
                'description' => $faker->realText(rand(150,250))
            ];
        }
        return $data;
    }

    public function getDataCatRelations ()
    {
        $data = [];
        $count = 1;
        for ($i = 1; $i < 40; $i++) {
            if ($i%20 === 0) $count = 1;
            $data[] = [
                'id_category' => mt_rand(1, 20),
                'id_news' => $count
            ];
            $count++;
        }
        return $data;
    }

    public function getDataSources ()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => $faker->sentence(rand(1,3)),
                'link' => $faker->imageUrl(500,500),
                'data_link' => $faker->imageUrl(500,500),
                'description' => $faker->realText(rand(150,250))
            ];
        }
        return $data;
    }
}
