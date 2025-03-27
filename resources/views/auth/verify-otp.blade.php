@extends('layouts.login')

@section('title', 'Verifikasi OTP')

@section('content')
<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <div class="bg-gray-300 w-64 h-20 rounded"></div>
</div>

<!-- Judul -->
<div class="text-center mb-2">
    <h1 class="text-black text-2xl font-bold">Masukkan kode reset kata sandi</h1>
</div>

<!-- Instruksi -->
<div class="text-center mb-4 px-6">
    <p class="text-gray-600 text-sm font-medium">
        Email telah dikirim, silahkan cek email untuk <br>
        <span class="block"> mendapatkan kode verifikasi</span>
    </p>
</div>

<!-- Form OTP -->
<form method="POST" action="{{ route('password.otp.verify') }}" class="w-full flex flex-col items-center">
    @csrf
    
    <!-- Input Kode Verifikasi -->
    <div class="w-full flex flex-col items-center mb-4 mt-8">
        <div class="flex space-x-3">
            @for ($i = 0; $i < 5; $i++)
                <input type="text" name="otp[]" maxlength="1" 
                       class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" 
                       required>
            @endfor
        </div>

        <!-- Timer -->
        <div class="w-full flex justify-center">
            <div class="w-[270px] flex justify-end mt-2">
                <p class="text-gray-500 text-sm font-medium">
                    <span class="font-bold text-black" id="countdown">01:00</span>
                </p>
            </div>
        </div>
    </div>

    @error('otp')
        <div class="text-red-500 mb-4">{{ $message }}</div>
    @enderror

    <!-- Kirim Ulang -->
    <div class="text-center mt-3">
        <p class="text-gray-600 font-semibold text-sm">
            Tidak menerima kode verifikasi? 
            <a href="{{ route('password.otp.resend') }}" class="text-[#E6C900] font-medium hover:underline">Kirim ulang</a>
        </p>
    </div>

    <!-- Tombol Selanjutnya -->
    <button type="submit" class="w-full sm:max-w-[80%] mt-3 md:max-w-[380px] bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow transition">
        Selanjutnya
    </button>

    <!-- Tombol Kembali -->
    <a href="{{ route('password.request') }}" class="w-full sm:max-w-[80%] mt-3 md:max-w-[380px] bg-white border border-[#FFDF00] text-black font-bold py-2 rounded-lg shadow text-center">
        Kembali
    </a>
</form>

<script>
    // Countdown timer
    let timeLeft = 60;
    const countdown = document.getElementById('countdown');
    
    const timer = setInterval(() => {
        timeLeft--;
        
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        
        countdown.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        if (timeLeft <= 0) {
            clearInterval(timer);
        }
    }, 1000);

    // Auto-focus dan auto-tab untuk input OTP
    const inputs = document.querySelectorAll('input[name="otp[]"]');
    
    inputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });
        
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
</script>
@endsection