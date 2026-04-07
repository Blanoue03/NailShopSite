<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Order Update</title></head>
<body style="margin:0;padding:0;background:#fdf0f3;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#fdf0f3;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border:1.5px solid #ddb8c4;border-radius:12px;overflow:hidden;">

      <!-- Header -->
      <tr>
        <td style="background:#6b3f52;padding:24px 32px;">
          <h1 style="margin:0;color:#fff;font-size:20px;letter-spacing:2px;text-transform:uppercase;">Order Update</h1>
        </td>
      </tr>

      <!-- Body -->
      <tr><td style="padding:32px;">

        <p style="margin:0 0 16px;color:#2c1a22;font-size:15px;line-height:1.6;">
          Hi <strong>{{ $order->customer_name }}</strong>,
        </p>
        <p style="margin:0 0 24px;color:#2c1a22;font-size:15px;line-height:1.6;">
          Unfortunately, we are unable to fulfil your order for <strong>{{ $order->product_name }}</strong> at this time.
        </p>

        <hr style="border:none;border-top:1.5px solid #ddb8c4;margin:0 0 24px;">

        <p style="margin:0;color:#6b3f52;font-size:13px;line-height:1.6;">
          If you have any questions or would like to discuss alternatives, please don't hesitate to reach out. We'd love to help find a solution that works for you.
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
