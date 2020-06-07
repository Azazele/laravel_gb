<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\YandexNews;
use App\Models\NewsSource;
use Illuminate\Http\Request;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = NewsSource::query()->paginate(10);
        $data = [
            'sources' => $sources,
            'metaTitle' => 'Все источники'
        ];
        return view('admin.newsSources', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'metaTitle' => 'Создать источник'
        ];
        return view('admin.addNewsSource', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NewsSource::create($request->all());

        return redirect()->route('admin.newsSources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsSource  $newsSource
     * @return \Illuminate\Http\Response
     */
    public function show(NewsSource $newsSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsSource  $newsSource
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsSource $newsSource)
    {
        $data = [
            'metaTitle' => 'Редактировать',
            'resource' => $newsSource
        ];
        return view('admin.editNewsSource', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsSource  $newsSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsSource $newsSource)
    {
        $newsSource->fill($request->all());
        $newsSource->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsSource  $newsSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsSource $newsSource)
    {
        $newsSource->delete();
        return back();
    }

    public function rssUpdate (int $id)
    {
        switch ($id){
            case 1:
                return back();
                break;
            case 7:
                $newsObj = new YandexNews;
                $newsObj->updateRss($id, 33);
                return back();
                break;
            default:
                return back();
        }

    }
}
