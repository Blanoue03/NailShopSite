<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Order Approved</title></head>
<body style="margin:0;padding:0;background:#fdf0f3;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#fdf0f3;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border:1.5px solid #ddb8c4;border-radius:12px;overflow:hidden;">

      <!-- Header -->
      <tr>
        <td style="background:#c0617e;padding:24px 32px;">
          <h1 style="margin:0;color:#fff;font-size:20px;letter-spacing:2px;text-transform:uppercase;">Order Approved!</h1>
        </td>
      </tr>

      <!-- Body -->
      <tr><td style="padding:32px;">

        <p style="margin:0 0 24px;color:#2c1a22;font-size:15px;line-height:1.6;">
          Hi <strong>{{ $order->customer_name }}</strong>, great news — your order has been approved!
        </p>

        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">

        <!-- Order Summary -->
        <p style="margin:0 0 12px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">Order Summary</p>
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
          <tr>
            <td style="color:#2c1a22;font-size:14px;padding:6px 0;">Product</td>
            <td align="right" style="color:#2c1a22;font-size:14px;font-weight:bold;">{{ $order->product_name }}</td>
          </tr>
          <tr>
            <td style="color:#2c1a22;font-size:14px;padding:6px 0;">Base Price</td>
            <td align="right" style="color:#2c1a22;font-size:14px;">${{ number_format($order->product_price, 2) }}</td>
          </tr>
          @if($order->custom_price_increase > 0)
          <tr>
            <td style="color:#2c1a22;font-size:14px;padding:6px 0;">Custom Work</td>
            <td align="right" style="color:#2c1a22;font-size:14px;">+${{ number_format($order->custom_price_increase, 2) }}</td>
          </tr>
          @endif
          <tr>
            <td style="border-top:1.5px solid #ddb8c4;color:#c0617e;font-size:16px;font-weight:bold;padding:10px 0 0;">Total Due</td>
            <td align="right" style="border-top:1.5px solid #ddb8c4;color:#c0617e;font-size:16px;font-weight:bold;padding:10px 0 0;">${{ number_format($order->total_price, 2) }}</td>
          </tr>
        </table>

        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">

        <!-- E-Transfer Details -->
        <p style="margin:0 0 12px;color:#6b3f52;font-size:12px;text-transform:uppercase;letter-spacing:1px;">Payment — E-Transfer</p>
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
          <tr>
            <td style="background:#fdf0f3;border:1.5px solid #ddb8c4;border-radius:8px;padding:16px;">
              <p style="margin:0 0 10px;color:#2c1a22;font-size:14px;"><strong>Send to:</strong> etransfer@matts-nails.com</p>
              <p style="margin:0 0 10px;color:#2c1a22;font-size:14px;"><strong>Amount:</strong> ${{ number_format($order->total_price, 2) }}</p>
              <p style="margin:0 0 10px;color:#2c1a22;font-size:14px;"><strong>Reference / Message:</strong> Order #{{ $order->id }}</p>
              <p style="margin:0;color:#6b3f52;font-size:12px;">No security question required — auto-deposit is enabled.</p>
            </td>
          </tr>
        </table>

        <p style="margin:0;color:#6b3f52;font-size:13px;line-height:1.6;">
          Your order will be processed once payment is received. If you have any questions, simply reply to this email.
        </p>

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
