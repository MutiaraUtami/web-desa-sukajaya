<x-layouts.guest :title="__('Login Admin')">
    <div class="flex min-h-screen">
        
        <div class="w-full md:w-3/5 flex flex-col items-center justify-center bg-white p-8 sm:p-12 z-10">
            <div class="w-full max-w-sm">
                
                <div class="flex justify-start mb-8">
                    <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa" class="h-16 w-auto object-contain">
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang!</h2>
                <p class="text-sm text-gray-500 mb-8">Silakan masukkan detail akun admin Anda.</p>

                <x-auth-session-status class="mb-4 text-center text-sm" :status="session('status')" />

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="Alamat Email"
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#1e6306] focus:ring-1 focus:ring-[#1e6306] transition-colors text-gray-700">
                    </div>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" name="password" required autocomplete="current-password" placeholder="Password"
                            class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#1e6306] focus:ring-1 focus:ring-[#1e6306] transition-colors text-gray-700">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" 
                            class="w-4 h-4 text-[#1e6306] bg-gray-100 border-gray-300 rounded focus:ring-[#1e6306]">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#1e6306] text-white font-bold py-3.5 rounded-xl hover:bg-[#0e2206] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1e6306]">
                            Masuk
                        </button>
                    </div>
                </form>
                <div class="mt-8 pt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-[#1e6306] transition-colors font-medium flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:w-2/5 items-center justify-center p-6 bg-white">
            <div class="relative w-full h-full rounded-3xl overflow-hidden">
                <img src="{{ asset('images/slider-2.jpeg') }}" alt="Pemandangan Desa" class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-[#0e2206]/70 to-transparent"></div>
                
                <div class="absolute bottom-10 left-10 text-white">
                    <h3 class="text-3xl text-[#fac81b] font-bold tracking-wider uppercase mb-1">Desa Sukajaya</h3>
                    <p class="text-white/80 text-sm">Sistem Informasi Manajemen Terpadu</p>
                </div>
            </div>
        </div>
        
    </div>
</x-layouts.guest>