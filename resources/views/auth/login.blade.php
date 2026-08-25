<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Portfolio Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --navy: #10213F; --brass: #A9812F; --paper: #F5F6F8; }
        body { background: var(--navy); font-family: 'Inter', system-ui, sans-serif; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-white text-2xl font-bold">Portfolio Admin</h1>
            <p class="text-white/40 text-sm mt-1">Masuk ke panel admin</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-lg shadow-lg p-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                       class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
            </div>

            <button type="submit"
                    class="w-full py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-medium text-sm rounded-lg transition">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
