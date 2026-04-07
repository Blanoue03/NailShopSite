<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>New Order</title></head>
<body style="margin:0;padding:0;background:#fdf0f3;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#fdf0f3;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border:1.5px solid #ddb8c4;border-radius:12px;overflow:hidden;">

      <!-- Header -->
      <tr>
        <td style="background:#c0617e;padding:24px 32px;">
          <h1 style="margin:0;color:#fff;font-size:20px;letter-spacing:2px;text-transform:uppercase;">
            @if($order->order_type === 'custom')
              New Custom Order
            @elseif($order->order_type === 'now')
              New Regular Order
            @else
              New General Inquiry
            @endif
          </h1>
        </td>
      </tr>

      <!-- Body -->
      <tr><td style="padding:32px;">

        <!-- Customer Info -->
        <p style="margin:0 0 8px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">Customer</p>
        <p style="margin:0 0 4px;color:#2c1a22;font-size:16px;"><strong>{{ $order->customer_name }}</strong></p>
        <p style="margin:0 0 24px;color:#2c1a22;font-size:14px;">{{ $order->customer_email }}</p>

        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">

        @if($order->product_name)
        <!-- Product Info -->
        <p style="margin:0 0 8px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">Product</p>
        <p style="margin:0 0 4px;color:#2c1a22;font-size:16px;"><strong>{{ $order->product_name }}</strong></p>
        <p style="margin:0 0 24px;color:#2c1a22;font-size:14px;">Base Price: <strong>${{ number_format($order->product_price, 2) }}</strong></p>
        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">
        @endif

        @if($order->message)
        <!-- Message -->
        <p style="margin:0 0 8px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">
          {{ $order->order_type === 'custom' ? 'Custom Requirements' : 'Message' }}
        </p>
        <p style="margin:0 0 24px;color:#2c1a22;font-size:14px;line-height:1.6;background:#fdf0f3;padding:16px;border-radius:8px;border:1.5px solid #ddb8c4;">{{ $order->message }}</p>
        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">
        @endif

        <!-- Action Buttons -->
        <p style="margin:0 0 16px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">Actions</p>

        @if($order->order_type === 'custom')
        <p style="margin:0 0 16px;color:#2c1a22;font-size:13px;">This is a <strong>custom order</strong>. Clicking Approve will take you to a page where you can set the final price before sending confirmation to the customer.</p>
        @endif

        <table cellpadding="0" cellspacing="0">
          <tr>
            <td style="padding-right:12px;">
              <a href="{{ url('/orders/' . $order->token . '/approve') }}"
                 style="display:inline-block;background:#c0617e;color:#fff;text-decoration:none;padding:14px 28px;border-radius:8px;font-size:13px;letter-spacing:1px;text-transform:uppercase;font-weight:bold;">
                {{ $order->order_type === 'custom' ? 'Set Price &amp; Approve' : 'Approve Order' }}
              </a>
            </td>
            <td>
              <a href="{{ url('/orders/' . $order->token . '/deny') }}"
                 style="display:inline-block;background:#fff;color:#2c1a22;text-decoration:none;padding:14px 28px;border-radius:8px;font-size:13px;letter-spacing:1px;text-transform:uppercase;border:1.5px solid #ddb8c4;">
                Deny Order
              </a>
            </td>
          </tr>
        </table>

      </td></tr>

      <!-- Footer -->
      <tr>
        <td style="background:#fdf0f3;padding:16px 32px;border-top:1.5px solid #ddb8c4;">
          <p style="margin:0;color:#6b3f52;font-size:12px;">Matt's Nails — Order #{{ $order->id }}</p>
        </td>
      </tr>

    </table>
  </td></tr>
</table>
</body>
</html>
