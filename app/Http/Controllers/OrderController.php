<?php

namespace App\Http\Controllers;

use App\Mail\OrderApprovedMail;
use App\Mail\OrderDeniedMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function approveShow(string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();
        return view('orders.approve', compact('order'));
    }

    public function approveStore(Request $request, string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();

        if ($order->status !== 'pending') {
            return redirect()->back()->with('done', 'This order has already been processed.');
        }

        if ($order->order_type === 'custom') {
            $request->validate(['custom_price_increase' => 'required|numeric|min:0']);
            $order->custom_price_increase = $request->custom_price_increase;
        }

        $order->status = 'approved';
        $order->save();

        try {
            Mail::to(config('mail.owner_email'))->send(new OrderApprovedMail($order));
        } catch (\Exception $e) {
            \Log::error('Approval email failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('done', 'Order approved! Confirmation email sent to ' . $order->customer_email . '.');
    }

    public function denyShow(string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();
        return view('orders.deny', compact('order'));
    }

    public function denyStore(string $token)
    {
        $order = Order::where('token', $token)->firstOrFail();

        if ($order->status !== 'pending') {
            return redirect()->back()->with('done', 'This order has already been processed.');
        }

        $order->status = 'denied';
        $order->save();

        try {
            Mail::to(config('mail.owner_email'))->send(new OrderDeniedMail($order));
        } catch (\Exception $e) {
            \Log::error('Denial email failed: ' . $e->getMessage());
        }

        return redirect()->back()->with('done', 'Order denied. Notification email sent to ' . $order->customer_email . '.');
    }
}
