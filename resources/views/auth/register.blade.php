<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HBN-Project | Daftar Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-2">HBN-Project</h1>
        <h2 class="text-xl font-semibold text-center mb-6">Buat Akun Baru</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium mb-1">Nama</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input id="password" name="password" type="password" required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk di sini</a>
        </p>
    </div>
</body>
</html>
