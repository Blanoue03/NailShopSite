<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deny Order — Matt's Nails</title>
  @vite(['resources/css/app.css'])
</head>
<body>
<main style="max-width:560px;margin:60px auto;padding:0 24px;">

  <div class="page-box">

    <div class="page-heading mb-6">Deny Order</div>

    @if(session('done'))
      <div style="background:#fae4ea;border:1.5px solid #ddb8c4;border-radius:8px;padding:16px;color:#2c1a22;">
        {{ session('done') }}
      </div>
    @elseif($order->status !== 'pending')
      <p style="color:#6b3f52;">This order has already been <strong>{{ $order->status }}</strong>.</p>
    @else

      <p style="color:#2c1a22;margin-bottom:20px;font-size:15px;line-height:1.6;">
        Deny the order from <strong>{{ $order->customer_name }}</strong>
        @if($order->product_name) for <strong>{{ $order->product_name }}</strong>@endif?
        <br>A notification email will be sent to <strong>{{ $order->customer_email }}</strong>.
      </p>

      <form method="POST" action="{{ url('/orders/' . $order->token . '/deny') }}">
        @csrf
        <button type="submit" style="width:100%;background:#6b3f52;color:#fff;border:none;border-radius:8px;padding:14px;font-size:13px;text-transform:uppercase;letter-spacing:1px;cursor:pointer;">
          Confirm Deny
        </button>
      </form>

    @endif

  </div>

</main>
</body>
</html>
