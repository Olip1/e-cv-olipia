<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ $cv['full_name'] }} | E-Curriculum Vitae & Portofolio Mahasiswi</title>
    <meta name="description" content="E-Curriculum Vitae {{ $cv['full_name'] }} - {{ $cv['title'] }} {{ $cv['sub_title'] }}. Berpengalaman dalam pengolahan data, administrasi perkantoran, dan pelayanan publik.">
    <meta name="keywords" content="Olipia, CV Olipia, E-CV Mahasiswi, CV Administrasi, UBSI Tasikmalaya, Portofolio Mahasiswi, Dinas Sosial Majalengka">
    <meta name="author" content="Olipia">
    
    <!-- Open Graph / Meta Sosial -->
    <meta property="og:title" content="{{ $cv['full_name'] }} - E-CV Mahasiswi Aktif & Administrasi">
    <meta property="og:description" content="Profil profesional, keahlian data entry, pengalaman PKL Dinas Sosial, dan riwayat organisasi Olipia.">
    <meta property="og:image" content="{{ asset('images/olipia-pas-foto.jpg') }}">
    <meta property="og:type" content="profile">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Tailwind CSS (CDN with Custom Palettes) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif'],
                    },
                    colors: {
                        rosewater: {
                            50: '#fff5f7',
                            100: '#ffeef2',
                            200: '#ffd2dc',
                            300: '#ffb2c2',
                            400: '#ff7e9a',
                            500: '#f64b73',
                            600: '#e12d59',
                            700: '#bd1b42',
                            800: '#9e183a',
                            900: '#841935',
                        },
                        blush: {
                            50: '#fbf7f8',
                            100: '#f6eff1',
                            200: '#eddfe3',
                            300: '#dec4cb',
                            400: '#c8a0ab',
                            500: '#b17f8d',
                            600: '#996372',
                            700: '#804f5d',
                            800: '#6b434e',
                            900: '#5a3b43',
                        },
                        sage: {
                            50: '#f4f7f5',
                            100: '#e6ede8',
                            500: '#5c8a6f',
                            600: '#486e58',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 30px -5px rgba(246, 75, 115, 0.08), 0 5px 15px -5px rgba(0, 0, 0, 0.04)',
                        'card': '0 10px 25px -3px rgba(189, 27, 66, 0.06), 0 4px 6px -2px rgba(0, 0, 0, 0.03)',
                        'glow': '0 0 25px rgba(246, 75, 115, 0.35)',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Modern aesthetic background pattern */
        .bg-mesh-pattern {
            background-color: #fff9fa;
            background-image: 
                radial-gradient(at 15% 15%, rgba(254, 215, 226, 0.6) 0px, transparent 50%),
                radial-gradient(at 85% 20%, rgba(230, 230, 250, 0.6) 0px, transparent 50%),
                radial-gradient(at 50% 70%, rgba(254, 243, 199, 0.4) 0px, transparent 50%),
                radial-gradient(at 90% 85%, rgba(255, 228, 230, 0.5) 0px, transparent 50%);
        }

        .dark .bg-mesh-pattern {
            background-color: #0f121a;
            background-image: 
                radial-gradient(at 15% 15%, rgba(94, 23, 44, 0.3) 0px, transparent 50%),
                radial-gradient(at 85% 20%, rgba(55, 48, 107, 0.3) 0px, transparent 50%),
                radial-gradient(at 50% 80%, rgba(30, 41, 59, 0.5) 0px, transparent 50%);
        }

        /* Glassmorphism utility */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .dark .glass-card {
            background: rgba(23, 27, 38, 0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Smooth badge pulse */
        @keyframes pulse-subtle {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.85; transform: scale(1.03); }
        }
        .pulse-subtle {
            animation: pulse-subtle 3s infinite ease-in-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #fff0f3;
        }
        ::-webkit-scrollbar-thumb {
            background: #f67280;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #e12d59;
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 dark:text-slate-100 bg-mesh-pattern min-h-screen selection:bg-rosewater-200 selection:text-rosewater-900 transition-colors duration-300">

    <!-- Navbar -->
    <header x-data="{ mobileMenu: false, scrolled: false }" 
            x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })"
            :class="scrolled ? 'bg-white/85 dark:bg-slate-900/90 backdrop-blur-md shadow-sm border-b border-rose-100/60 dark:border-slate-800' : 'bg-transparent'"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand -->
                <a href="#hero" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-rosewater-500 via-rose-400 to-amber-300 flex items-center justify-center text-white font-extrabold text-xl shadow-md shadow-rosewater-500/25 group-hover:scale-105 transition-transform">
                        O
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-extrabold text-xl tracking-tight text-slate-900 dark:text-white group-hover:text-rosewater-600 transition-colors">
                            {{ $cv['full_name'] }}
                        </span>
                        <span class="text-[11px] font-semibold text-rose-500 dark:text-rose-400 uppercase tracking-widest -mt-1">
                            Curriculum Vitae
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="#tentang" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Tentang
                    </a>
                    <a href="#pendidikan" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Pendidikan
                    </a>
                    <a href="#pengalaman" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Pengalaman PKL
                    </a>
                    <a href="#organisasi" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Organisasi
                    </a>
                    <a href="#keahlian" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Keahlian
                    </a>
                    <a href="#kontak" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/70 dark:hover:bg-slate-800 transition-all">
                        Kontak
                    </a>
                </nav>

                <!-- Actions: Print / PDF & Theme Toggle -->
                <div class="hidden md:flex items-center space-x-3">
                    
                    <!-- Dark Mode Toggle Button -->
                    <button @click="darkMode = !darkMode" 
                            type="button"
                            class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-slate-800 text-slate-600 dark:text-amber-300 hover:text-rosewater-600 flex items-center justify-center transition-colors border border-rose-100/60 dark:border-slate-700" 
                            title="Beralih Tema">
                        <i class="fa-solid fa-moon text-base" x-show="!darkMode"></i>
                        <i class="fa-solid fa-sun text-base" x-show="darkMode" x-cloak></i>
                    </button>

                    <!-- Print / Download PDF CV Link -->
                    <a href="{{ route('cv.print') }}" target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold tracking-wide uppercase bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200/80 dark:border-slate-700 hover:border-rosewater-400 hover:text-rosewater-600 shadow-sm transition-all hover:scale-[1.02]">
                        <i class="fa-solid fa-file-pdf text-rose-500"></i>
                        <span>Cetak / PDF</span>
                    </a>

                    <!-- Direct WA CTA -->
                    <a href="{{ $cv['contact']['whatsapp_url'] }}" target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold tracking-wide uppercase bg-gradient-to-r from-rosewater-500 to-rose-600 text-white shadow-md shadow-rosewater-500/25 hover:shadow-lg hover:shadow-rosewater-500/40 hover:from-rosewater-600 hover:to-rose-700 transition-all hover:scale-[1.02]">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        <span>Hubungi</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 md:hidden">
                    <button @click="darkMode = !darkMode" 
                            type="button"
                            class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-slate-800 text-slate-600 dark:text-amber-300 flex items-center justify-center transition-colors border border-rose-100 dark:border-slate-700">
                        <i class="fa-solid fa-moon text-sm" x-show="!darkMode"></i>
                        <i class="fa-solid fa-sun text-sm" x-show="darkMode" x-cloak></i>
                    </button>

                    <button @click="mobileMenu = !mobileMenu" 
                            class="w-10 h-10 rounded-xl bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-rose-100 dark:border-slate-700 flex items-center justify-center focus:outline-none">
                        <i class="fa-solid fa-bars text-lg" x-show="!mobileMenu"></i>
                        <i class="fa-solid fa-xmark text-lg" x-show="mobileMenu" x-cloak></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Dropdown Navigation -->
        <div x-show="mobileMenu" 
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden glass-card border-b border-rose-100 dark:border-slate-800 px-4 pt-2 pb-6 space-y-2">
            <a @click="mobileMenu = false" href="#tentang" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-regular fa-user mr-2 text-rose-500"></i> Tentang
            </a>
            <a @click="mobileMenu = false" href="#pendidikan" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-solid fa-graduation-cap mr-2 text-rose-500"></i> Pendidikan
            </a>
            <a @click="mobileMenu = false" href="#pengalaman" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-solid fa-briefcase mr-2 text-rose-500"></i> Pengalaman PKL
            </a>
            <a @click="mobileMenu = false" href="#organisasi" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-solid fa-users mr-2 text-rose-500"></i> Organisasi
            </a>
            <a @click="mobileMenu = false" href="#keahlian" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-solid fa-sparkles mr-2 text-rose-500"></i> Keahlian
            </a>
            <a @click="mobileMenu = false" href="#kontak" class="block px-4 py-2.5 rounded-xl font-medium text-slate-700 dark:text-slate-200 hover:bg-rose-50 dark:hover:bg-slate-800">
                <i class="fa-regular fa-envelope mr-2 text-rose-500"></i> Kontak
            </a>
            <div class="pt-3 flex flex-col gap-2">
                <a href="{{ route('cv.print') }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-center text-xs font-semibold uppercase tracking-wide bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200">
                    <i class="fa-solid fa-file-pdf text-rose-500"></i> Cetak / Simpan PDF
                </a>
                <a href="{{ $cv['contact']['whatsapp_url'] }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-center text-xs font-semibold uppercase tracking-wide bg-rosewater-500 text-white">
                    <i class="fa-brands fa-whatsapp"></i> Hubungi WhatsApp
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="pt-24 pb-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-rose-100/80 dark:border-slate-800/80 bg-white/60 dark:bg-slate-900/60 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-rosewater-500 to-rose-400 flex items-center justify-center text-white font-bold shadow-md shadow-rosewater-500/20">
                        O
                    </div>
                    <div>
                        <div class="font-display font-bold text-slate-800 dark:text-white">{{ $cv['full_name'] }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400">{{ $cv['sub_title'] }}</div>
                    </div>
                </div>

                <div class="flex items-center gap-6 text-sm text-slate-600 dark:text-slate-400">
                    <a href="#hero" class="hover:text-rosewater-600 transition-colors">Beranda</a>
                    <a href="#tentang" class="hover:text-rosewater-600 transition-colors">Tentang</a>
                    <a href="#pengalaman" class="hover:text-rosewater-600 transition-colors">PKL</a>
                    <a href="#kontak" class="hover:text-rosewater-600 transition-colors">Kontak</a>
                    <a href="{{ route('cv.print') }}" target="_blank" class="hover:text-rosewater-600 transition-colors">Format PDF</a>
                </div>

                <div class="text-center md:text-right">
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        &copy; {{ date('Y') }} {{ $cv['full_name'] }}. Dibuat dengan <i class="fa-solid fa-heart text-rose-500"></i> menggunakan Laravel.
                    </p>
                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5">
                        Siap dideploy di Vercel Serverless.
                    </p>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>

