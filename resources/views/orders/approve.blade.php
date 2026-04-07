<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Approve Order — Matt's Nails</title>
  @vite(['resources/css/app.css'])
</head>
<body>
<main style="max-width:560px;margin:60px auto;padding:0 24px;">

  <div class="page-box">

    <div class="page-heading mb-6">
      {{ $order->order_type === 'custom' ? 'Approve Custom Order' : 'Approve Order' }}
    </div>

    @if(session('done'))
      <div style="background:#fae4ea;border:1.5px solid #ddb8c4;border-radius:8px;padding:16px;margin-bottom:24px;color:#2c1a22;">
        {{ session('done') }}
      </div>
    @endif

    @if($order->status !== 'pending')
      <p style="color:#6b3f52;">This order has already been <strong>{{ $order->status }}</strong>.</p>
    @else

      <!-- Order Details -->
      <div style="margin-bottom:24px;">
        <p style="margin:0 0 4px;font-size:12px;color:#6b3f52;text-transform:uppercase;letter-spacing:1px;">Customer</p>
        <p style="margin:0 0 2px;font-weight:bold;color:#2c1a22;">{{ $order->customer_name }}</p>
        <p style="margin:0 0 20px;color:#2c1a22;font-size:14px;">{{ $order->customer_email }}</p>

        @if($order->product_name)
        <p style="margin:0 0 4px;font-size:12px;color:#6b3f52;text-transform:uppercase;letter-spacing:1px;">Product</p>
        <p style="margin:0 0 2px;font-weight:bold;color:#2c1a22;">{{ $order->product_name }}</p>
        <p style="margin:0 0 20px;color:#2c1a22;font-size:14px;">Base Price: ${{ number_format($order->product_price, 2) }}</p>
        @endif

        @if($order->message)
        <p style="margin:0 0 4px;font-size:12px;color:#6b3f52;text-transform:uppercase;letter-spacing:1px;">
          {{ $order->order_type === 'custom' ? 'Custom Requirements' : 'Message' }}
        </p>
        <p style="margin:0 0 20px;color:#2c1a22;font-size:14px;background:#fdf0f3;padding:12px;border-radius:8px;border:1.5px solid #ddb8c4;">{{ $order->message }}</p>
        @endif
      </div>

      <form method="POST" action="{{ url('/orders/' . $order->token . '/approve') }}">
        @csrf

        @if($order->order_type === 'custom')
        <div style="margin-bottom:20px;">
          <label style="display:block;font-size:12px;color:#6b3f52;text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">
            Custom Price Increase ($)
          </label>
          <input
            type="number"
            name="custom_price_increase"
            min="0"
            step="0.01"
            placeholder="0.00"
            class="form-input"
            required
          />
          <p style="margin:6px 0 0;font-size:12px;color:#6b3f52;">
            Base: ${{ number_format($order->product_price, 2) }} + your increase = total sent to customer.
          </p>
        </div>
        @endif

        <button type="submit" style="width:100%;background:#c0617e;color:#fff;border:none;border-radius:8px;padding:14px;font-size:13px;text-transform:uppercase;letter-spacing:1px;cursor:pointer;">
          {{ $order->order_type === 'custom' ? 'Send Approval with Price' : 'Confirm Approval' }}
        </button>

      </form>

    @endif

  </div>

</main>
</body>
</html>
