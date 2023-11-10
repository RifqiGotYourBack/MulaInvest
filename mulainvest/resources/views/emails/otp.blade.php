<!DOCTYPE html>
<html>
<head>
    <title>OTP Email</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto;">
        <h2>One-Time Password (OTP)</h2>
        <p>Your OTP for verification is:</p>
        <h1 style="background-color: #f0f0f0; padding: 10px; border-radius: 5px;">{{ $otp }}</h1>
        <p>Please use this OTP to verify your account.</p>
        <p>If you did not request this OTP, please ignore this email.</p>
        <hr>
        <p style="color: #999;">This email was sent from our application for OTP verification.</p>
    </div>
</body>
</html>
