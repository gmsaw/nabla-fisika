<x-guest-layout>
    <div class="w-full max-w-md mx-auto pt-32 pb-16 px-8">
        
        {{-- Judul --}}
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-8">
            Selamat Datang Kembali,
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email"
                    class="w-full px-5 py-4 rounded-xl border border-slate-300 dark:border-slate-700 bg-transparent text-slate-900 dark:text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm text-lg">
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password (dengan fitur intip password) -->
            <div x-data="{ show: false }" class="relative">
                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password" placeholder="Password"
                    class="w-full px-5 py-4 pr-12 rounded-xl border border-slate-300 dark:border-slate-700 bg-transparent text-slate-900 dark:text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm text-lg">
                
                {{-- Tombol Ikon Mata --}}
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-slate-700 dark:hover:text-slate-300">
                    <!-- Icon Mata Tertutup (default) -->
                    <svg x-show="!show" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                    <!-- Icon Mata Terbuka -->
                    <svg x-show="show" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </button>
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ingat Saya & Lupa Password -->
            <div class="flex flex-col gap-5">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="w-5 h-5 rounded border-slate-300 dark:border-slate-600 text-blue-600 shadow-sm focus:ring-blue-500 dark:bg-transparent" name="remember">
                    <span class="ml-3 text-lg text-slate-900 dark:text-white">Ingat Saya</span>
                </label>

                @if (Route::has('password.request'))
                    <div class="text-right">
                        <a class="text-lg text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    </div>
                @endif
            </div>

            <!-- Tombol Masuk -->
            <button type="submit" class="w-full py-4 px-4 rounded-3xl shadow-sm text-lg font-bold text-slate-50 bg-[#1f2b38] hover:bg-slate-100 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white transition-all dark:focus:ring-offset-slate-900 mt-4 border border-slate-900">
                Masuk
            </button>
        </form>

        <!-- Pemisah "Atau" -->
        <div class="mt-8 mb-6 flex items-center">
            <div class="flex-grow border-t border-slate-300 dark:border-slate-700"></div>
            <span class="flex-shrink-0 mx-4 text-slate-500 dark:text-slate-400 text-lg">Atau</span>
            <div class="flex-grow border-t border-slate-300 dark:border-slate-700"></div>
        </div>

        <!-- Tombol HIMAFI -->
        <a href="#" class="relative w-full flex items-center justify-center py-3 px-4 rounded-3xl border border-slate-300 dark:border-slate-700 bg-transparent hover:bg-slate-50 dark:hover:bg-slate-800 transition">
            {{-- Logo di pojok kiri menggunakan absolute --}}
            <div class="absolute left-4 w-8 h-8 rounded-full overflow-hidden flex-shrink-0 bg-white">
                <img src="{{ asset('images/logo_himafi.png') }}" alt="HIMAFI" class="w-9 h-9 object-cover">
            </div>
            
            {{-- Teks tetap di tengah --}}
            <span class="text-lg pl-6 font-bold text-slate-900 dark:text-white">Masuk dengan HIMAFI</span>
        </a>

    </div>
</x-guest-layout>