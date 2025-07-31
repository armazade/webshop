<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Inertia\Inertia;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return Inertia::render('Admin/Order/Index', [
            'orders' => $orders,
        ]);
    }
}
