<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Menampilkan daftar katering
    public function index()
    {
        $merchants = Merchant::all();
        return view('customers.index', compact('merchants'));
    }

    // Menampilkan menu katering tertentu
    public function showMenus($merchantId)
    {
        $merchant = Merchant::findOrFail($merchantId);
        $menus = Menu::where('merchant_id', $merchantId)->get();
        return view('customers.showMenus', compact('merchant', 'menus'));
    }

    // Membuat pesanan
    public function createOrder($menuId)
    {
        $menu = Menu::findOrFail($menuId);
        return view('orders.create', compact('menu'));
    }

    // Menyimpan pesanan
    public function storeOrder(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->menu_id = $menu->id;
        $order->jumlah = $request->jumlah;
        $order->tanggal_pengiriman = $request->tanggal_pengiriman;
        $order->save();

        return redirect()->route('invoices.show', $order->id);
    }

    // Menampilkan invoice untuk pesanan
    public function showInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $invoice = Invoice::where('order_id', $orderId)->firstOrFail();
        return view('invoices.show', compact('invoice', 'order'));
    }
}
