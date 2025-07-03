<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - HBN-Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .spinner {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <!-- Judul Project -->
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-1">HBN-Project</h1>
        <h2 class="text-xl font-semibold mb-6 text-center">Masuk ke Akun Anda</h2>

        <!-- Flash message -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input id="email" name="email" type="email" required autofocus
                       value="{{ old('email') }}"
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input id="password" name="password" type="password" required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-900">
                    Ingat saya
                </label>
            </div>

            <div class="flex justify-between items-center text-sm">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition flex items-center justify-center gap-2">
                <span id="submitText">Masuk</span>
                <span id="spinner" class="spinner hidden"></span>
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

    <script>
        const form = document.getElementById('loginForm');
        form.addEventListener('submit', () => {
            document.getElementById('submitText').textContent = "Memproses...";
            document.getElementById('spinner').classList.remove('hidden');
        });
    </script>
</body>
</html>
