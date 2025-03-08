<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Buat Akun</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 p-6">
    <div class="bg-white p-10 rounded-2xl md:h-[650px] h-full shadow-xl max-w-full w-full">
    <a href="">
            <h1 class="text-2xl font-bold text-gray-800 mb-8 text-left flex items-center -ml-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 mr-2 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Buat Akun
            </h1>
        </a>
        <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-2 gap-6 ml-6">
            @csrf

            <!-- NIP -->
            <div>
                <label for="nip" class="block text-gray-700 font-medium text-sm mb-1">Nama Instansi<span class="text-red-500">*</span></label>
                <input type="text" id="nip" name="nip" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan NIP" required>
            </div>

            <!-- Nama -->
            <div>
                <label for="name" class="block text-gray-700 font-medium text-sm mb-1">Alamat<span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" :value="old('name')" autofocus autocomplete="name" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan Alamat" required>
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label for="phone" class="block text-gray-700 font-medium text-sm mb-1">NPWP<span class="text-red-500">*</span></label>
                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan NPWP " required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium text-sm mb-1">Nomor PIC 1<span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" :value="old('email')" autocomplete="username" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan Nomor PIC 1" required>
            </div>

            <!-- Alamat -->
            <div>
                <label for="address" class="block text-gray-700 font-medium text-sm mb-1">Nama PIC 2<span class="text-red-500">*</span></label>
                <input type="text" id="address" name="address" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan Nama PIC 2" required>
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label for="birthplace" class="block text-gray-700 font-medium text-sm mb-1"> Nomor Telepon PIC<span class="text-red-500">*</span></label>
                <input type="text" id="birthplace" name="birthplace" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan Nomor Telepon PIC" required>
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium text-sm mb-1">Email<span class="text-red-500">*</span></label>
                <input type="text" id="address" name="address" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm" placeholder="Masukkan Email" required>
            </div>
            

            <!-- Password -->
            <div class="relative">
                <label for="password" class="block text-gray-700 font-medium text-sm mb-1">Kata Sandi<span class="text-red-500">*</span></label>
                <input type="password" id="password" name="password" autocomplete="new-password" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm pr-10" placeholder="Masukkan kata sandi" required>
                <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" class="absolute right-3 top-9 text-gray-500">
                    <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Konfirmasi Password -->
            <div class="relative">
                <label for="confirm_password" class="block text-gray-700 font-medium text-sm mb-1">Ketik Ulang Kata Sandi<span class="text-red-500">*</span></label>
                <input type="password" id="confirm_password" name="password_confirmation" autocomplete="new-password" class="w-full border border-gray-300 rounded-lg py-2 px-3 text-sm pr-10" placeholder="Masukkan ulang kata sandi" required>
                <button type="button" onclick="togglePassword('confirm_password', 'toggleConfirmPasswordIcon')" class="absolute right-3 top-9 text-gray-500">
                    <svg id="toggleConfirmPasswordIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <!-- Tombol Simpan -->
            <div class="col-span-1 md:col-span-2 text-center mt-3">
                <button type="submit"
                    class="w-full sm:max-w-[80%] md:max-w-[380px] bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow hover:bg-yellow-600 transition mb-4">
                    Simpan
                </button>
            </div>

        </form>
    </div>
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A9.956 9.956 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.02 10.02 0 015.339-5.339m3.303-.661a9.956 9.956 0 013.303-.661c4.478 0 8.268 2.943 9.542 7a10.02 10.02 0 01-5.339 5.339m-3.303.661A9.956 9.956 0 0112 19m0 0a9.956 9.956 0 01-3.303-.661M12 5a9.956 9.956 0 013.303.661M3 3l18 18" />
            `;
            } else {
                input.type = "password";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            }
        }
    </script>

</body>

</html>