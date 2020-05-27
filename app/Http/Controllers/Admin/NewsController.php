<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\queue;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'metaTitle' => 'Все новости - Админ панель',
            'news' => News::query()->orderBy('updated_at', 'DESC')->paginate(10)
        ];
        return view('admin.news', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'metaTitle' => 'Добавить новость - Админ панель',
            'cats' => Category::all()
        ];
        return view('admin.addNews',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create($request->all());
        $cats = [];
        foreach ($request->cats as $cat_id) {
            $cats[] = Category::find($cat_id);
        }

        $news->cats()->saveMany($cats);

        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $data = [
            'metaTitle' => 'Редактировать новость - Админ панель',
            'cats' => Category::all(),
            'news' => $news
        ];

        return view('admin.editNews',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->fill($request->all());
        $news->save();

        $cats = [];
        foreach ($request->cats as $cat_id) {
            $cats[] = Category::find($cat_id);
        }

        $news->cats()->saveMany($cats);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return back();
    }
}
