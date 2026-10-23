<!-- this is message email template -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            margin: 0;
            padding: 24px;
            direction: rtl;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        .header {
            background-color: #0f172a;
            padding: 24px;
            text-align: center;
            border-bottom: 1px solid #334155;
        }
        .header h1 {
            color: #facc15;
            font-size: 20px;
            margin: 0;
            font-weight: bold;
        }
        .content {
            padding: 24px;
        }
        .field {
            margin-bottom: 16px;
        }
        .label {
            font-size: 12px;
            color: #94a3b8;
            font-weight: bold;
            margin-bottom: 4px;
            text-transform: uppercase;
        }
        .value {
            font-size: 15px;
            color: #f1f5f9;
            background-color: #0f172a;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #334155;
        }
        .message-box {
            font-size: 15px;
            color: #f1f5f9;
            background-color: #0f172a;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #334155;
            white-space: pre-line;
            line-height: 1.6;
        }
        .footer {
            padding: 16px 24px;
            background-color: #0f172a;
            border-top: 1px solid #334155;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 رسالة جديدة من موقع Whiscrashow</h1>
        </div>

        <div class="content">
            <div class="field">
                <div class="label">اسم الراسل:</div>
                <div class="value">{{ $data['name'] }}</div>
            </div>

            <div class="field">
                <div class="label">البريد الإلكتروني:</div>
                <div class="value" dir="ltr" style="text-align: right;">{{ $data['email'] }}</div>
            </div>

            <div class="field">
                <div class="label">الموضوع:</div>
                <div class="value">{{ $data['subject'] }}</div>
            </div>

            <div class="field">
                <div class="label">نص الرسالة:</div>
                <div class="message-box">{{ $data['message'] }}</div>
            </div>
        </div>

        <div class="footer">
            تم إرسال هذه الرسالة تلقائياً من نموذج "اتصل بنا" الخاص بموقع Whiscrashow.
        </div>
    </div>
</body>
</html>
