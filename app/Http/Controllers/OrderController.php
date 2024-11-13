<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showMenu()
    {
        $menus = Menu::all();
        return view('customer.menu', compact('menus'));
    }

    public function placeOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);
        return redirect()->route('customer.orders.index')->with('success', 'Order placed!');
    }

    public function showOrders()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('customer.orders.index', compact('orders'));
    }
}