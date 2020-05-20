<?php


namespace App\Services;


class OrderWrite
{
    public static function saveOrderJson ($json) {
        $content = file_get_contents(storage_path('app/orders.json'));
        $newContent = "$content, $json";
        file_put_contents(storage_path('app/orders.json'), $newContent);
    }

}
