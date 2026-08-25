<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — IkiCode Admin</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#6366F1',
                        navy: '#0B1120',
                    },
                    fontFamily: {
                        display: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(60px, -40px) scale(1.1); }
            50% { transform: translate(-30px, 30px) scale(0.95); }
            75% { transform: translate(40px, 50px) scale(1.05); }
        }
        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(-50px, 40px) scale(1.08); }
            66% { transform: translate(40px, -30px) scale(0.92); }
        }
        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            20% { transform: translate(30px, 50px) scale(1.05); }
            40% { transform: translate(-40px, -20px) scale(0.95); }
            60% { transform: translate(50px, -40px) scale(1.1); }
            80% { transform: translate(-20px, 30px) scale(0.98); }
        }
        .float-1 { animation: float1 12s ease-in-out infinite; }
        .float-2 { animation: float2 15s ease-in-out infinite; }
        .float-3 { animation: float3 18s ease-in-out infinite; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeUp 0.6s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
    </style>
</head>
<body class="min-h-screen bg-navy flex items-center justify-center p-4 relative overflow-hidden">

    {{-- Animated Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="float-1 absolute top-[10%] left-[15%] w-[350px] h-[350px] bg-gradient-to-br from-brand/25 to-purple-500/15 rounded-full blur-3xl"></div>
        <div class="float-2 absolute bottom-[15%] right-[10%] w-[400px] h-[400px] bg-gradient-to-tr from-pink-500/20 to-brand/15 rounded-full blur-3xl"></div>
        <div class="float-3 absolute top-[50%] left-[50%] -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-gradient-to-r from-purple-500/15 to-cyan-500/10 rounded-full blur-3xl"></div>

        {{-- Grid dots --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.03]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="dots" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="white"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#dots)"/>
        </svg>
    </div>

    <div class="relative w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8 animate-fade-up">
            <div class="inline-flex items-center gap-2.5 mb-4">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-brand to-purple-500 flex items-center justify-center shadow-lg shadow-brand/30">
                    <span class="text-white font-bold text-lg">iC</span>
                </div>
                <span class="font-display font-extrabold text-2xl text-white">Iki<span class="text-brand-light">Code</span></span>
            </div>
            <p class="text-white/40 text-sm">Masuk ke panel admin</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}" class="animate-fade-up delay-100 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl shadow-black/20 p-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-4.5 h-4.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@admin.com"
                           class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg class="w-4.5 h-4.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                           class="w-full pl-11 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all">
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                        <svg id="eye-off" class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878l4.242 4.242M21 21l-5.197-5.197"/></svg>
                        <svg id="eye-on" class="w-4.5 h-4.5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
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

        <p class="text-center text-white/20 text-xs mt-6 animate-fade-up delay-200">&copy; {{ date('Y') }} IkiCode</p>
    </div>

    <script>
        function togglePassword() {
            var pw = document.getElementById('password');
            var eyeOff = document.getElementById('eye-off');
            var eyeOn = document.getElementById('eye-on');
            if (pw.type === 'password') {
                pw.type = 'text';
                eyeOff.classList.add('hidden');
                eyeOn.classList.remove('hidden');
            } else {
                pw.type = 'password';
                eyeOff.classList.remove('hidden');
                eyeOn.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
