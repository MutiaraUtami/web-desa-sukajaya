<x-layouts.app title="Struktur Organisasi">
    <div class="max-w-6xl mx-auto px-4 py-10 space-y-12">
        
        {{-- 1. BAGIAN BAGAN STRUKTUR (CRUD) --}}
        <section class="bg-white rounded-lg shadow p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b pb-4 mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Bagan Struktur Organisasi</h1>
                    <p class="text-sm text-gray-500">Visualisasi hierarki pemerintahan desa.</p>
                </div>
                
                {{-- Tombol Manajemen Bagan (Hanya muncul jika user memiliki akses admin/auth) --}}
                @auth
                    <div class="flex gap-2">
                        @if($bagan)
                            <a href="{{ route('admin.organisasi') }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded shadow transition">
                                Kelola Bagan
                            </a>
                        @else
                            <a href="{{ route('admin.organisasi') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded shadow transition">
                                + Tambah Bagan
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            {{-- Area Tampilan Gambar Bagan --}}
            <div class="flex justify-center bg-gray-50 rounded-lg p-4 overflow-x-auto">
                @if($bagan && $bagan->gambar)
                    <img src="{{ asset('storage/' . $bagan->gambar) }}" alt="Bagan Struktur Organisasi Desa" class="max-w-full h-auto rounded shadow-sm object-contain">
                @else
                    <div class="text-center py-12 text-gray-400">
                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="mt-2 text-sm">Belum ada gambar bagan struktur yang diunggah.</p>
                    </div>
                @endif
            </div>
        </section>

        {{-- 2. BAGIAN PENJELASAN --}}
        <section class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Deskripsi & Pembagian Tugas</h2>
            <div class="prose max-w-none text-gray-600 leading-relaxed">
                <p>
                    Pemerintah Desa dipimpin oleh Kepala Desa yang dibantu oleh Perangkat Desa sebagai unsur staf yang membantu Kepala Desa dalam menyusun kebijakan dan pelaksanaan kebijakan. Perangkat desa terdiri dari Sekretariat Desa, Pelaksana Teknis (Kasi), dan Pelaksana Kewilayahan (Kadus).
                </p>
                <p class="mt-3">
                    Sistem ini dirancang untuk memastikan pelayanan publik di tingkat desa berjalan secara transparan, akuntabel, dan responsif terhadap kebutuhan seluruh warga masyarakat.
                </p>
            </div>
        </section>

        {{-- 3. BAGIAN DAFTAR APARATUR DESA --}}
        <section>
            <div class="mb-6 border-b pb-2">
                <h2 class="text-xl font-bold text-gray-800">Daftar Aparatur Pemerintah Desa</h2>
                <p class="text-sm text-gray-500">Profil singkat para pelayan masyarakat.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @forelse ($organisasi as $o)
                    <div class="bg-white rounded-lg shadow p-4 text-center border border-gray-100 hover:shadow-md transition relative group">
                        <img src="{{ $o->foto ? asset('storage/'.$o->foto) : 'https://ui-avatars.com/api/?name='.urlencode($o->nama) }}" class="w-24 h-24 rounded-full mx-auto object-cover mb-3 border-2 border-gray-200">
                        <div class="font-semibold text-gray-800">{{ $o->nama }}</div>
                        <div class="text-sm text-gray-500 font-medium mt-0.5">{{ $o->jabatan }}</div>
                        
                        {{-- Opsi CRUD untuk Anggota Aparatur (Muncul saat hover jika login) --}}
                        @auth
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.organisasi') }}" class="p-1 bg-yellow-400 text-white rounded hover:bg-yellow-500" title="Kelola di Admin">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                            </div>
                        @endauth
                    </div>
                @empty
                    <p class="text-gray-500 col-span-1 sm:col-span-2 md:col-span-4 text-center py-8 bg-white rounded-lg shadow">Belum ada data struktur organisasi.</p>
                @endforelse
            </div>
        </section>

    </div>
</x-layouts.app>