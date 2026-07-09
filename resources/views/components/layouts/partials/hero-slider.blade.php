<section class="relative min-h-[400px] md:h-[600px] overflow-hidden bg-zinc-900 text-white flex flex-col justify-between">
    
    <div class="absolute inset-0 z-0">
        <div class="slide-item absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-1.jpeg') }}" alt="Rapat Minggon" class="w-full h-full object-cover">
        </div>
        
        <div class="slide-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-2.jpeg') }}" alt="Wisata Gunung Sembung" class="w-full h-full object-cover">
        </div>
        
        <div class="slide-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-3.jpeg') }}" alt="Kantor Desa Sukajaya" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto w-full px-6 md:px-12 grid grid-cols-1 md:grid-cols-12 gap-6 items-center flex-grow pt-2 pb-0">
        
        <div class="md:col-span-7 text-left flex flex-col justify-center">
            <span class="w-max text-sm md:text-base font-semibold tracking-wider text-green-200 border border-green-200 bg-green-500/10 uppercase px-3 py-1 rounded-full mb-2 drop-shadow-md">
                Digitalisasi Desa
            </span>
            
            <h1 class="font-extrabold text-3xl md:text-5xl lg:text-6xl text-white leading-tight drop-shadow-lg mb-4">
                Selamat Datang <br>di Website<br>
                <span class="text-emerald-100">Desa Sukajaya</span>
            </h1>
            
            <p class="max-w-xl text-sm md:text-base text-zinc-200 font-normal tracking-wide drop-shadow-md">
                {{ $profil->sambutan ?? 'Website resmi desa untuk informasi, transparansi, dan pelayanan publik secara digital.' }}
            </p>
        </div>

        <div class="md:col-span-5 h-full flex items-end justify-center md:justify-end relative overflow-visible group">
            <!-- Foto Kepala Desa -->
            <img src="{{ asset('images/kepala-desa.png') }}" 
                alt="Kepala Desa Sukajaya" 
                class="max-h-[420px] md:max-h-[560px] lg:max-h-[610px] object-contain object-bottom drop-shadow-[0_10px_25px_rgba(0,0,0,0.5)] z-20 transform scale-105 origin-bottom transition-all duration-300 group-hover:scale-110">

            <!-- Label Mengapung Keterangan Kepala Desa -->
            <div class="absolute bottom-27 left-10/2 -translate-x-10/2 md:left-auto md:right-4 md:translate-x-0 z-30 bg-black/60 border border-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-xl flex flex-col gap-0.5 animate-bounce-slow text-center md:text-left min-w-[180px]">
                <span class="text-[18px] uppercase tracking-widest text-emerald-300 font-bold">
                    Kepala Desa
                </span>
                <span class="text-[16px] md:text-sm font-semibold text-white tracking-wide whitespace-nowrap">
                    Nama Kepala Desa, S.Sos <!-- Silakan sesuaikan nama di sini -->
                </span>
            </div>
        </div>
    </div>

    <div class="relative z-30 bg-gradient-to-t from-black/80 to-transparent pt-6 pb-6 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            
            <div class="flex flex-col items-center md:items-end gap-2 text-center md:text-right">
                <p id="slide-caption" class="text-[11px] md:text-xs text-zinc-300 font-medium tracking-wider uppercase bg-black/40 px-3 py-1 rounded-full backdrop-blur-xs transition-all duration-500">
                    Rapat Minggon
                </p>
                <div class="flex gap-2">
                    <span class="slide-dot w-6 h-1.5 rounded-full bg-white transition-all duration-300 cursor-pointer" onclick="goToSlide(0)"></span>
                    <span class="slide-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" onclick="goToSlide(1)"></span>
                    <span class="slide-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" onclick="goToSlide(2)"></span>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    let slideInterval;
    
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.slide-dot');
    const captionEl = document.getElementById('slide-caption');
    const captions = Array.from(slides).map(slide => slide.querySelector('img').getAttribute('alt'));

    function updateSliderVisuals() {
        slides.forEach((slide, index) => {
            if (index === currentSlide) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');
                dots[index].classList.remove('bg-white/40', 'w-2');
                dots[index].classList.add('bg-white', 'w-6');
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
                dots[index].classList.remove('bg-white', 'w-6');
                dots[index].classList.add('bg-white/40', 'w-2');
            }
        });

        if (captionEl) {
            captionEl.textContent = captions[currentSlide] || '';
        }
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        updateSliderVisuals();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateSliderVisuals();
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }

    document.addEventListener("DOMContentLoaded", function () {
        slideInterval = setInterval(nextSlide, 5000);
    });
</script>