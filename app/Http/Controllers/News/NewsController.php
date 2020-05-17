<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        [
            'id' => '1',
            'title' => 'Котики атакуют',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'date_published' => '2020-5-09',
            'cat_id' => '3'
        ],
        [
            'id' => '2',
            'title' => 'Правительство всех обманывало',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-08',
            'cat_id' => '1'
        ],
        [
            'id' => '3',
            'title' => 'Камера ноутбука. Что скрывает Цукерберг',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-07',
            'cat_id' => '1'
        ],
        [
            'id' => '4',
            'title' => 'Короновирус. Достаточно лиш одной ложки соды чтобы...',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-06',
            'cat_id' => '4'
        ],
        [
            'id' => '5',
            'title' => 'Купить слона или выиграть миллион. Как рептилойды узнают о наших желаниях',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-05',
            'cat_id' => '1'
        ],
        [
            'id' => '6',
            'title' => 'Инопланетяне-католики среди нас',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-04',
            'cat_id' => '2'
        ],
        [
            'id' => '7',
            'title' => 'Веришь в бога?',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-03',
            'cat_id' => '2'
        ],
        [
            'id' => '8',
            'title' => 'Ты когда-то плакал не техно? У тебя лились слёзы на рейве?',
            'img' => 'https://sun1-21.userapi.com/2LEnqroDFxtzR9fCRb74epY1NmdH0Rd1smIhlw/L0yvdVj2QJY.jpg',
            'content' => 'Etiam et scelerisque nisi. Nullam porta, lorem in lacinia pulvinar, diam orci maximus sapien, at vulputate mauris ex ac nibh. Etiam tempor nec ligula quis gravida. Quisque volutpat justo ac massa viverra, quis laoreet ex condimentum. Sed luctus fermentum quam sit amet suscipit. Nam dapibus bibendum purus, ut finibus nisi dapibus in. Curabitur eleifend volutpat malesuada. Phasellus ut est at risus commodo ultricies in nec est. Donec at mattis elit, quis pretium justo. Morbi vulputate vitae dui ac tincidunt. Donec lobortis placerat volutpat. Nulla facilisi. Maecenas ullamcorper bibendum mauris, in hendrerit erat vestibulum in.',
            'date_published' => '2020-5-02',
            'cat_id' => '3'
        ]

    ];


    private $cats = [
        '1' => 'Паранойя',
        '2' => 'Религия',
        '3' => 'Животные',
        '4' => 'Медицина'
    ];


    public function getNews() {
        return $this->news;
    }

    public function getCats() {
        return $this->cats;
    }

    public function getNewsByCatId (int $cat_id) {
        $news = $this->getNews();
        $sortedNews = [];
        foreach ($news as $elem) {
            if ($elem['cat_id'] == $cat_id) {
                $sortedNews[] = $elem;
            }
        }
        return $sortedNews;
    }

    public function getCatById (int $cat_id) {
        $cats = $this->getCats();
        foreach ($cats as $key => $elem) {
            if ($key == $cat_id) {
                return [
                    'id' => $key,
                    'name' => $elem,
                ];
            }
        }
    }

    public function getNewsById (int $news_id) {
        $news = $this->getNews();
        $sortedNews = [];
        foreach ($news as $elem) {
            if ($elem['id'] == $news_id) {
                $sortedNews[] = $elem;
            }
        }
        return $sortedNews;
    }

    public function getCatByNewsId (int $news_id) {
        $news = $this->getNews();
        foreach ($news as $elem) {
            if ($elem['id'] == $news_id) {
                return $this->getCatById($elem['cat_id']);
            }
        }
    }

    public function getCountOfNews () {
        $news = $this->getNews();
        return count($news);
    }

    public function allNews () {
        $data = [
            'news' => $this->getNews(),
            'view' => 'news/allNews',
            'metaTitle' => 'Все новости'
        ];
        return view ('base', $data);
    }

    public function newsSingle (int $id) {
        $data = [
            'news' => $this->getNewsById($id)[0],
            'view' => 'news/newsSingle',
            'cat' => $this->getCatByNewsId($id),
            'metaTitle' => $this->getNewsById($id)[0]['title']
        ];
        return view ('base', $data);
    }

    public function allCats () {
        $data = [
            'cats' => $this->getCats(),
            'view' => 'news/allCats',
            'metaTitle' => 'Все категории'
        ];
        return view ('base', $data);
    }

    public function cat (int $id) {
        $data = [
            'news' => $this->getNewsByCatId($id),
            'view' => 'news/allNews',
            'h' => 'Категория: ' . $this->getCats()[$id],
            'metaTitle' => $this->getCats()[$id]
        ];
        return view ('base', $data);
    }

    public function addNewsRedir () {
        $nextId = $this->getCountOfNews() + 1;
        return redirect(route('news.add', $nextId));
    }

    public function addNews (int $id) {
        $data = [
            'view' => 'news/add',
            'metaTitle' => 'Добавить новость',
            'cats' => $this->getCats()
        ];
        return view ('base', $data);
    }
}
