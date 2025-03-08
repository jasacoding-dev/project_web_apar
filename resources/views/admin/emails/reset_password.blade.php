<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
</head>
<body>
    <h2>Reset Kata Sandi</h2>
    <p>Halo, {{ $user->name }}!</p>
    <p>Anda menerima email ini karena kami menerima permintaan reset kata sandi untuk akun Anda.</p>
    <p>Silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:</p>
    <a href="{{ route('admin.lupasandi2', ['token' => $token, 'email' => $user->email]) }}" style="background-color: #0168AD; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Reset Kata Sandi
    </a>
    <p>Jika Anda tidak meminta reset kata sandi, abaikan email ini.</p>
</body>
</html>