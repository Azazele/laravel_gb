<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderWrite;

class OrderController extends Controller
{
    public function index (Request $request)
    {
        $data = [
            'metaTitle' => 'Заказ данных'
        ];
        if($request->isMethod('post')) {
            $order = $request->only(['name', 'phone', 'email', 'order']);
            OrderWrite::saveOrderJson(json_encode($order));
        }

        return view('order', $data);
    }
}
