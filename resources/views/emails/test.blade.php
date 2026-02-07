<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body style="margin:0;padding:0;background:#2D2D2D;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#2D2D2D;padding:24px 0;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#252525;border:1px solid #3A3A3A;border-radius:14px;overflow:hidden;">
          <tr>
            <td style="padding:18px 18px 8px 18px;color:#FDFBD8;font-family:Arial,sans-serif;">
              <div style="font-size:14px;font-weight:700;letter-spacing:.2px;">
                Newsletter • {{ config('app.name') }}
              </div>
            </td>
          </tr>

          <tr>
            <td style="padding:0 18px 18px 18px;color:#ffffff;font-family:Arial,sans-serif;">
              <div style="font-size:18px;font-weight:700;margin-bottom:10px;">
                Mailgun test delivered ✅
              </div>
              <div style="font-size:14px;line-height:1.6;color:#cfcfcf;">
                If you received this email, your Laravel 12 mail setup is working locally.
                <br><br>
                <strong style="color:#ffffff;">Sent at:</strong> {{ now()->toDayDateTimeString() }}
                <br>
                <strong style="color:#ffffff;">Environment:</strong> {{ app()->environment() }}
              </div>
            </td>
          </tr>

          <tr>
            <td style="padding:0 18px 18px 18px;font-family:Arial,sans-serif;">
              <a href="{{ config('app.url') }}"
                style="display:inline-block;background:#ffffff;color:#000000;text-decoration:none;padding:10px 14px;border-radius:10px;font-size:12px;font-weight:700;">
                Open Website
              </a>
            </td>
          </tr>

          <tr>
            <td style="padding:14px 18px;border-top:1px solid #3A3A3A;color:#9ca3af;font-family:Arial,sans-serif;font-size:12px;">
              © {{ date('Y') }} Ellipsis Etcetera
            </td>
          </tr>
        </table>

        <div style="max-width:600px;width:100%;color:#6b7280;font-family:Arial,sans-serif;font-size:11px;padding:12px 10px;">
          This is a test email. Email clients block forms and most scripts/CSS.
        </div>
      </td>
    </tr>
  </table>
</body>

</html>