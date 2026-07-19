<x-layouts.guest title="Login Admin">
    
    <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md border border-gray-100">
        
        <div class="flex justify-center mb-6">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa Sukajaya" class="h-20 w-auto object-contain hover:scale-105 transition-transform">
            </a>
        </div>

        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-gray-800">Login Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk untuk mengelola sistem informasi desa.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-6 flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#1e6306] focus:ring-2 focus:ring-[#1e6306]/20 outline-none transition-all bg-gray-50 focus:bg-white" 
                    placeholder="admin@sukajaya.desa.id" required autofocus autocomplete="email">
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-xs text-[#1e6306] hover:text-[#fac81b] font-medium transition-colors">Lupa Password?</a>
                </div>
                <input type="password" id="password" name="password" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:border-[#1e6306] focus:ring-2 focus:ring-[#1e6306]/20 outline-none transition-all bg-gray-50 focus:bg-white" 
                    placeholder="••••••••" required autocomplete="current-password">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-[#1e6306] text-white font-semibold py-2.5 rounded-lg hover:bg-[#0e2206] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1e6306] transition-all duration-200 shadow-md hover:shadow-lg flex justify-center items-center gap-2 group">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>
        </form>

        <div class="text-center mt-8 pt-6 border-t border-gray-100">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-[#1e6306] transition-colors font-medium flex items-center justify-center gap-1.5 group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
        
    </div>
    
</x-layouts.guest>