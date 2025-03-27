<!DOCTYPE html>
<html>

<head>
    <title>Kode OTP Reset Password</title>
</head>

<body>
    <h1>Kode OTP Reset Password</h1>
    <p>Gunakan kode berikut untuk reset password Anda:</p>

    <div style="font-size: 24px; font-weight: bold; letter-spacing: 2px; margin: 20px 0;">
        {{ $otpCode }}
    </div>

    <p>Kode ini akan kadaluarsa dalam 5 menit.</p>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
</body>

</html>