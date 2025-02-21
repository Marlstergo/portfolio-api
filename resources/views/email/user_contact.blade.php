<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>New User Contact</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f7f7f7; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="background: #2563eb; padding: 30px; border-radius: 8px 8px 0 0;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; text-align: center;">New Contact Message</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <div style="background: #f8fafc; border-left: 4px solid #2563eb; padding: 15px; margin-bottom: 25px;">
                <p style="margin: 0; color: #64748b; font-size: 16px;">From</p>
                <p style="margin: 5px 0 0 0; color: #1e293b; font-size: 18px; font-weight: 500;">{{ $data['first_name'] }} {{ $data['last_name'] }}</p>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 16px;">{{ $data['email'] }}</p>
            </div>

            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 20px; margin-bottom: 25px;">
                <h2 style="margin: 0 0 15px 0; color: #1e293b; font-size: 18px; font-weight: 600;">Message</h2>
                <p style="margin: 0; color: #334155; line-height: 1.6; font-size: 16px;">{{ $data['message'] }}</p>
            </div>

            <!-- Call to Action -->
            <div style="text-align: center; margin-top: 30px;">
                <a href="https://abdulmaliq.dev" style="display: inline-block; background: #2563eb; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 6px; font-weight: 500; font-size: 16px;">Visit Website</a>
            </div>
        </div>

        <!-- Footer -->
        <div style="padding: 20px; background: #f8fafc; border-radius: 0 0 8px 8px; text-align: center;">
            <p style="margin: 0; color: #64748b; font-size: 14px;">This email was sent from the contact form at</p>
            <p style="margin: 5px 0 0 0; color: #1e293b; font-weight: 500; font-size: 14px;">abdulmaliq.dev</p>
            <p style="margin: 15px 0 0 0; color: #64748b; font-size: 12px;">Lagos, Nigeria</p>
        </div>
    </div>
</body>
</html>
