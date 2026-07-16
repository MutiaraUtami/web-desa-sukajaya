<section class="relative min-h-[400px] md:h-[600px] overflow-hidden bg-zinc-900 text-white flex flex-col justify-between">
    
    <div class="absolute inset-0 z-0">
        <div class="slide-item absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-1.jpeg') }}" alt="Rapat Minggon" class="w-full h-full object-cover">
        </div>
        
        <div class="slide-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-2.jpeg') }}" alt="Wisata Gn. Sembung" class="w-full h-full object-cover">
        </div>
        
        <div class="slide-item absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent z-10"></div>
            <img src="{{ asset('images/slider-3.jpeg') }}" alt="Kantor Desa Sukajaya" class="w-full h-full object-cover">
        </div>
    </div>

    <div class="absolute inset-x-0 bottom-0 z-20 pointer-events-none select-none">
        <svg
            viewBox="0 0 1440 446"
            class="w-full h-auto"
            preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M0 445.823C6.65678 445.864 13.3235 445.886 20 445.886H20C647.905 445.886 1189.61 263.465 1440 0V445.886H20H0V445.823Z"
                fill="#1e6306"
            />
        </svg>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto w-full px-6 md:px-12 grid grid-cols-1 md:grid-cols-12 gap-6 items-center flex-grow pt-12 md:pt-0">
        
        <div class="md:col-span-7 text-left flex flex-col justify-center z-20">
            <span class="w-max text-xs md:text-sm font-bold tracking-wide text-white bg-[#1e6306] px-3 py-1 rounded-md mb-4 shadow-sm">
                Digitalisasi Desa
            </span>
            
            <h1 class="font-extrabold text-5xl md:text-6xl text-white leading-[1.15] drop-shadow-md mb-6">
                Selamat Datang <br>di Website<br>
                <span class="text-[#fac81b]">Desa Sukajaya</span>
            </h1>
            
            <p class="max-w-xl text-sm md:text-base text-white/95 font-medium tracking-wide leading-relaxed drop-shadow">
                {{ $profil->sambutan ?? 'Website resmi desa untuk informasi, transparansi, dan pelayanan publik secara digital.' }}
            </p>
        </div>

        <div class="hidden md:flex md:col-span-5 h-full items-end justify-end relative">
            <img src="{{ asset('images/kepala-desa.png') }}" 
                alt="Kepala Desa Sukajaya" 
                class="h-[480px] lg:h-[540px] object-contain z-20 drop-shadow-[0_4px_15px_rgba(0,0,0,0.3)] select-none">

            <div class="absolute bottom-9 right-0 z-30 bg-white border-t-4 border-[#fac81b] px-5 py-3 rounded-md shadow-2xl flex flex-col min-w-[200px] text-left">
                <span class="text-xs uppercase tracking-wider text-[#1e6306] font-extrabold">
                    Kepala Desa
                </span>
                <span class="text-sm font-bold text-zinc-800 tracking-wide mt-0.5 whitespace-nowrap">
                    {{ $profil->nama_kades ?? 'Nirwan Suherman' }}
                </span>
            </div>
        </div>
    </div>

    <div class="relative z-20 bg-[#0e2206] w-full border-t border-white/5">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-stretch justify-between">
            
            <div class="flex-grow flex items-center bg-[#0e2206] py-3 px-6 overflow-hidden min-h-[50px]">
                <span class="bg-[#1e6306] text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded mr-4 whitespace-nowrap shadow-sm">
                    Pengumuman
                </span>
                <div class="relative w-full overflow-hidden whitespace-nowrap flex items-center">
                    <div class="inline-block animate-[marquee_25s_linear_infinite] text-sm text-white font-medium tracking-wide">
                        Selamat Datang di Website Resmi Desa Sukajaya. Website ini hadir sebagai wujud transparansi, pusat kebugaran informasi, dan kemudahan pelayanan publik bagi seluruh warga. &nbsp;&nbsp;&nbsp;&nbsp; • &nbsp;&nbsp;&nbsp;&nbsp; 
                    </div>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-4 bg-black/20 px-6 py-3 border-l border-white/5 min-w-[250px] justify-end">
                <p id="slide-caption" class="text-[11px] text-zinc-300 font-semibold tracking-wider uppercase whitespace-nowrap">
                    Rapat Minggon
                </p>
                <div class="flex gap-2 items-center">
                    <span class="slide-dot w-6 h-1.5 rounded-full bg-white transition-all duration-300 cursor-pointer" onclick="goToSlide(0)"></span>
                    <span class="slide-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" onclick="goToSlide(1)"></span>
                    <span class="slide-dot w-2 h-1.5 rounded-full bg-white/40 transition-all duration-300 cursor-pointer" onclick="goToSlide(2)"></span>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        animation: marquee 25s linear infinite;
    }
</style>

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
                slide.classList.remove('opacity-0', 'pointer-events-none');
                slide.classList.add('opacity-100');
                if(dots[index]) {
                    dots[index].classList.remove('bg-white/40', 'w-2');
                    dots[index].classList.add('bg-white', 'w-6');
                }
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0', 'pointer-events-none');
                if(dots[index]) {
                    dots[index].classList.remove('bg-white', 'w-6');
                    dots[index].classList.add('bg-white/40', 'w-2');
                }
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