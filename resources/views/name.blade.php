<!DOCTYPE html>
<html>
<head>
    <title>Email Template</title>
</head>
<body>
    <h1>Your Subject: {{ $data['your-subject'] }}</h1>
    
    <p>Dear recipient,</p>
    
    <p>This is the content of the email.</p>
    
    <p>Here is the information you provided:</p>
    <ul>
        <li>Your Name: {{ $data['your-name'] }}</li>
        <li>Your Email: {{ $data['your-email'] }}</li>
        <li>Your Subject: {{ $data['your-subject'] }}</li>
        <li>Your Message: {{ $data['your-message'] }}</li>
    </ul>
    
    <p>Thank you for your submission.</p>
</body>
</html>