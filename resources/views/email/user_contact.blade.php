<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>New User Contact</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>New Contact Message</h2>
        <p>From: {{ $data['name'] }} ({{ $data['email'] }})</p>
        <div style="margin: 20px 0; padding: 15px; background: #f5f5f5; border-radius: 5px;">
            {{ $data['message'] }}
        </div>
        <hr>
        <footer style="font-size: 12px; color: #666;">
            <p>This email was sent from the contact form at abdulmaliq.dev</p>
            <p>[Your Physical Address]</p>
        </footer>
    </div>
</body>

</html>
