<?php

namespace App\Http\Controllers;

use App\Mail\NewOrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Contact', [
            'orderType'    => $request->query('orderType'),
            'productId'    => $request->query('productId'),
            'productName'  => $request->query('productName'),
            'productPrice' => $request->query('productPrice'),
        ]);
    }

    public function send(Request $request)
    {
        $isCustom = $request->order_type === 'custom';

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'message'       => $isCustom ? 'required|string|max:5000' : 'nullable|string|max:5000',
            'order_type'    => 'nullable|string',
            'product_id'    => 'nullable|integer',
            'product_name'  => 'nullable|string|max:255',
            'product_price' => 'nullable|numeric|min:0',
        ]);

        $order = Order::create([
            'customer_name'  => $request->name,
            'customer_email' => $request->email,
            'product_id'     => $request->product_id,
            'product_name'   => $request->product_name ?? 'General Inquiry',
            'product_price'  => $request->product_price ?? 0,
            'order_type'     => $request->order_type ?? 'general',
            'message'        => $request->message,
            'status'         => 'pending',
            'token'          => Str::uuid(),
        ]);

        Mail::to('w0870874@myscc.ca')->send(new NewOrderMail($order));

        return back()->with('success', 'Your request has been submitted! You will receive an email once it has been reviewed.');
    }
}
