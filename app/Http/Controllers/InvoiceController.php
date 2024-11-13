<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Menampilkan invoice berdasarkan order
    public function showInvoice($orderId)
    {
        $invoice = Invoice::where('order_id', $orderId)->first();
        return view('customer.invoice', compact('invoice'));
    }
}
