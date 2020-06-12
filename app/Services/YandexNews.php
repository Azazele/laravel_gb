<?php


namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Carbon\Carbon;


class YandexNews
{
    public function updateRss (string $link, int $id) {
        $linkRss = $link;
        $xml = simplexml_load_file($linkRss);
        $items = $xml->channel->item;

        $newCategoryTitle = (string) $xml->channel->title;
        $newCategoryDescription = (string) $xml->channel->description;
        $catId = '';


        $checkCategory = Category::where('title', '=', $newCategoryTitle)->first();
        if ($checkCategory === null) {
             $cat = Category::create([
                 'title' => $newCategoryTitle,
                 'description' => $newCategoryDescription
             ]);
             $catId = $cat->id;
         } else {
             $catId = $checkCategory->id;
         }

         $news = [];
         foreach ($items as $item) {
             $checkItem = News::where('title', '=', (string) $item->title)->first();
             if ($checkItem === null) {
                 $news[] = [
                     'title' => (string) $item->title,
                     'content' => (string) $item->description,
                     'id_source' => $id
                 ];
             }
         }
         if (!empty($news)) {
             foreach ($news as $elem) {
                 $newNews = News::create($elem);
                 $newNews->cats()->save(Category::find($catId));
             }
         }
     }
}
