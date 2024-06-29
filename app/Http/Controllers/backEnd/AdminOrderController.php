<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\shop\order;
use App\Models\shop\orderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index(){
        $titlePass = "Đơn hàng";
        $order = order::all();
        $itemOrder = orderItem::all();

        return view("backEnd/order/list", [
            "titlePass" => $titlePass,
            "order" => $order,
            "itemOrder" => $itemOrder,
        ]);
        
    }
}
