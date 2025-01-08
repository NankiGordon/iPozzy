<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Made</title>
    <style>
        /* Define your custom styles for the email layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9dc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.5;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>New Offer on Your Property: {{ $property->title }}</h2>
        </div>

        <div class="content">
            <p>Dear {{ $property->user->name }},</p>
            <p>You have received a new offer on your property: <strong>{{ $property->title }}</strong>.</p>
            <p><strong>Offer Price:</strong> R{{ number_format($offer->price, 2) }}</p>
            <p><strong>Message:</strong> {{ $offer->message ?? 'No message provided' }}</p>
            <p><strong>Phone Number:</strong> {{ $offer->phone_number }}</p>
        </div>

        <div class="footer">
            <p>Thank you for using our platform!</p>
        </div>
    </div>
</body>

</html>
