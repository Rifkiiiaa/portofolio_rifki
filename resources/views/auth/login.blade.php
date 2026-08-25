<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — IkiCode Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-navy flex items-center justify-center p-4 relative overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 -right-40 w-[500px] h-[500px] bg-gradient-to-br from-brand/30 to-purple-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] bg-gradient-to-tr from-pink-500/20 to-brand/15 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2.5 mb-4">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center shadow-lg shadow-brand/30">
                    <span class="text-white font-bold text-lg">iC</span>
                </div>
                <span class="font-display font-extrabold text-2xl text-white">Iki<span class="text-brand-light">Code</span></span>
            </div>
            <p class="text-white/40 text-sm">Masuk ke panel admin</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-2xl shadow-2xl shadow-black/20 p-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                @error('email')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                @error('password')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                       class="h-4 w-4 rounded border-slate-300 text-brand focus:ring-brand">
                <label for="remember" class="ml-2 text-sm text-slate-600">Ingat saya</label>
            </div>

            <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-brand to-purple-500 hover:shadow-lg hover:shadow-brand/30 text-white font-semibold text-sm rounded-xl transition-all hover:-translate-y-0.5">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
