<?php


namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Carbon\Carbon;


class YandexNews
{
    public function updateRss (int $id, int $cat_id) {
        $link = NewsSource::find($id)->data_link;
        $xml = simplexml_load_file($link);
        $items = $xml->channel->item;

        $news = [];
        foreach ($items as $item) {
            $checkItem = News::where('title', '=', (string) $item->title)->first();
            if ($checkItem === null) {
                $news[] = [
                    'title' => (string) $item->title,
                    'content' => (string) $item->description
                ];
            }
        }
        if (!empty($news)) {
            foreach ($news as $elem) {
                $newNews = News::create($elem);
                $newNews->cats()->save(Category::find($cat_id));
            }
        }
    }

}
