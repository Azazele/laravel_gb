<?php

namespace App\Jobs;

use App\Services\YandexNews;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $link;
    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($link, $id)
    {
        $this->link = $link;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(YandexNews $yandexNews)
    {
        $yandexNews->updateRss($this->link, $this->id);
    }
}
