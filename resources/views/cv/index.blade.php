@extends('layouts.app')

@section('content')

<!-- Container -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24" x-data="{ modalCv: false }">

    <!-- Flash Message Notification -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition 
             class="p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3 text-emerald-800 dark:text-emerald-200 text-sm font-medium">
                <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!-- HERO SECTION -->
    <section id="hero" class="relative pt-6 sm:pt-10">
        
        <!-- Decorative Background Glows -->
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-96 h-96 bg-rose-200/40 dark:bg-rose-900/20 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-amber-200/30 dark:bg-amber-900/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left: Photo & Quick Badges -->
            <div class="lg:col-span-5 flex flex-col items-center">
                <div class="relative group">
                    
                    <!-- Gradient Glow Ring -->
                    <div class="absolute -inset-2 bg-gradient-to-r from-rosewater-500 via-rose-300 to-amber-200 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition duration-500"></div>

                    <!-- Photo Card Container -->
                    <div class="relative w-64 h-72 sm:w-72 sm:h-80 rounded-3xl overflow-hidden glass-card p-3 shadow-xl border-2 border-white/80 dark:border-slate-700/80">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative group/img cursor-pointer" @click="modalCv = true">
                            <img src="{{ asset('images/olipia-pas-foto.jpg') }}" 
                                 alt="Pas Foto {{ $cv['full_name'] }}" 
                                 class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-500">
                            
                            <!-- Overlay on hover with zoom hint -->
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover/img:opacity-100 transition-opacity flex flex-col items-center justify-center text-white text-xs font-semibold gap-2">
                                <i class="fa-solid fa-magnifying-glass-plus text-2xl"></i>
                                <span>Lihat Scan CV Asli</span>
                            </div>
                        </div>

                        <!-- Badge Semester Akhir / Aktif -->
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="glass-card py-2 px-3 rounded-xl shadow-lg border border-white/60 dark:border-slate-600/60 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                                    <span class="text-xs font-bold text-slate-800 dark:text-white">Mahasiswi Aktif</span>
                                </div>
                                <span class="text-[10px] font-bold text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-slate-800 px-2 py-0.5 rounded-full">
                                    UBSI Tasikmalaya
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Floating Pill Top Right -->
                    <div class="absolute -top-3 -right-3 hidden sm:flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card shadow-md border border-white/80 dark:border-slate-700 text-xs font-semibold text-slate-700 dark:text-slate-200">
                        <i class="fa-solid fa-award text-amber-500"></i>
                        <span>Eks Ketua PMR</span>
                    </div>

                    <!-- Floating Pill Bottom Left -->
                    <div class="absolute -bottom-4 -left-3 hidden sm:flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card shadow-md border border-white/80 dark:border-slate-700 text-xs font-semibold text-slate-700 dark:text-slate-200">
                        <i class="fa-solid fa-briefcase text-rosewater-600"></i>
                        <span>PKL Dinsos Majalengka</span>
                    </div>

                </div>

                <!-- View Original CV Scan Button -->
                <button type="button" 
                        @click="modalCv = true"
                        class="mt-6 inline-flex items-center gap-2 text-xs font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 transition-colors">
                    <i class="fa-solid fa-file-image"></i>
                    <span>Buka Lembar CV Asli (Lampiran Foto)</span>
                </button>
            </div>

            <!-- Hero Right: Bio & Pitch -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <!-- Availability Status Tag -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-50 dark:bg-rose-950/60 border border-rose-200/80 dark:border-rose-900/60 text-xs font-semibold text-rose-700 dark:text-rose-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Tersedia untuk Magang / PKL / Entry-Level Staff</span>
                </div>

                <!-- Main Name & Title -->
                <div class="space-y-2">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-display font-extrabold text-slate-900 dark:text-white tracking-tight">
                        Halo, Saya <span class="bg-gradient-to-r from-rosewater-600 via-rose-500 to-amber-500 bg-clip-text text-transparent">{{ $cv['name'] }}</span> <span class="inline-block animate-bounce">👋</span>
                    </h1>
                    <p class="text-lg sm:text-xl font-medium text-slate-600 dark:text-slate-300">
                        {{ $cv['title'] }} &mdash; <span class="text-rose-600 dark:text-rose-400 font-semibold">{{ $cv['sub_title'] }}</span>
                    </p>
                </div>

                <!-- Bio Summary extracted from image -->
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 leading-relaxed font-normal">
                    "{{ $cv['about']['summary'] }} {{ $cv['about']['description'] }}"
                </p>

                <!-- Quick Contact Pills -->
                <div class="flex flex-wrap gap-2.5 justify-center lg:justify-start pt-1">
                    <a href="{{ $cv['contact']['whatsapp_url'] }}" target="_blank"
                       class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl glass-card text-xs font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 transition-colors">
                        <i class="fa-brands fa-whatsapp text-emerald-500"></i>
                        <span>{{ $cv['contact']['phone_display'] }}</span>
                    </a>
                    <a href="mailto:{{ $cv['contact']['email'] }}"
                       class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl glass-card text-xs font-semibold text-slate-700 dark:text-slate-200 hover:text-rose-600 transition-colors">
                        <i class="fa-regular fa-envelope text-rose-500"></i>
                        <span>{{ $cv['contact']['email'] }}</span>
                    </a>
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl glass-card text-xs font-semibold text-slate-700 dark:text-slate-200">
                        <i class="fa-solid fa-location-dot text-sky-500"></i>
                        <span>{{ $cv['contact']['location'] }}</span>
                    </div>
                </div>

                <!-- Main CTA Action Buttons -->
                <div class="pt-4 flex flex-wrap gap-4 justify-center lg:justify-start">
                    
                    <!-- Direct WA Chat -->
                    <a href="{{ $cv['contact']['whatsapp_url'] }}" target="_blank"
                       class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-rosewater-500 to-rose-600 hover:from-rosewater-600 hover:to-rose-700 shadow-lg shadow-rosewater-500/30 hover:shadow-xl hover:shadow-rosewater-500/40 transition-all hover:scale-[1.02]">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>Hubungi via WhatsApp</span>
                    </a>

                    <!-- Print / Download PDF -->
                    <a href="{{ route('cv.print') }}" target="_blank"
                       class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-2xl font-bold text-sm text-slate-800 dark:text-white glass-card hover:bg-white dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-md transition-all hover:scale-[1.02]">
                        <i class="fa-solid fa-print text-rose-500"></i>
                        <span>Unduh / Cetak CV PDF</span>
                    </a>

                    <!-- Jump to Contact Section -->
                    <a href="#kontak"
                       class="inline-flex items-center gap-2 px-5 py-3.5 rounded-2xl font-semibold text-sm text-slate-600 dark:text-slate-300 hover:text-rosewater-600 hover:bg-rose-50/60 dark:hover:bg-slate-800/60 transition-colors">
                        <span>Kirim Pesan</span>
                        <i class="fa-solid fa-arrow-down text-xs"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- STATS BAR -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($cv['stats'] as $stat)
                <div class="glass-card p-5 rounded-2xl text-center shadow-sm hover:shadow-md transition-shadow border border-rose-100/50 dark:border-slate-800">
                    <div class="text-2xl sm:text-3xl font-display font-black text-rosewater-600 dark:text-rose-400">
                        {{ $stat['number'] }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-600 dark:text-slate-300 mt-1">
                        {{ $stat['label'] }}
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <!-- TENTANG SAYA SECTION -->
    <section id="tentang" class="space-y-8 scroll-mt-28">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Profil & Dedikasi
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Tentang Saya
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            
            <!-- Left Card: Bio Expanded -->
            <div class="lg:col-span-7 glass-card p-6 sm:p-8 rounded-3xl shadow-soft space-y-6 flex flex-col justify-between">
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <i class="fa-solid fa-quote-left text-rose-400"></i>
                        <span>Komitmen dan Nilai Kerja</span>
                    </h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Sebagai mahasiswi aktif semester akhir di bidang Sistem Informasi UBSI Kampus Kota Tasikmalaya, saya memadukan pemahaman teknologi dengan ketelitian administrasi. Fokus utama saya adalah memastikan setiap data terkelola dengan rapi, tertib, dan siap digunakan untuk pengambilan keputusan maupun pelayanan masyarakat yang prima.
                    </p>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Saya terbiasa memegang amanah dengan disiplin tinggi, cepat beradaptasi terhadap prosedur kerja baru, dan selalu berusaha memberikan dampak positif dalam setiap lingkungan kerja serta organisasi yang saya jalani.
                    </p>
                </div>

                <!-- 4 Value Badges -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    @foreach($cv['about']['highlights'] as $highlight)
                        <div class="p-3.5 rounded-2xl bg-white/70 dark:bg-slate-800/70 border border-rose-100/60 dark:border-slate-700 flex items-start gap-3">
                            <div class="w-8 h-8 rounded-xl bg-rose-50 dark:bg-slate-700 text-rose-500 dark:text-rose-400 flex items-center justify-center shrink-0">
                                <i class="fa-solid {{ $highlight['icon'] }} text-xs"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-800 dark:text-white">{{ $highlight['title'] }}</h4>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5 leading-snug">{{ $highlight['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Card: Quick Facts & Highlights -->
            <div class="lg:col-span-5 glass-card p-6 sm:p-8 rounded-3xl shadow-soft space-y-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-id-card-clip text-rose-500"></i>
                        <span>Informasi Personal</span>
                    </h3>
                    
                    <ul class="space-y-3.5 text-sm">
                        <li class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                            <span class="text-slate-500 dark:text-slate-400">Nama Lengkap</span>
                            <span class="font-bold text-slate-800 dark:text-white">{{ $cv['full_name'] }}</span>
                        </li>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                            <span class="text-slate-500 dark:text-slate-400">Status Studi</span>
                            <span class="font-bold text-rosewater-600 dark:text-rose-400">{{ $cv['status'] }}</span>
                        </li>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                            <span class="text-slate-500 dark:text-slate-400">Kampus</span>
                            <span class="font-bold text-slate-800 dark:text-white text-right">UBSI Tasikmalaya</span>
                        </li>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                            <span class="text-slate-500 dark:text-slate-400">Domisili</span>
                            <span class="font-bold text-slate-800 dark:text-white">Sukamantri, Ciamis</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-slate-500 dark:text-slate-400">Minat Karir</span>
                            <span class="font-bold text-slate-800 dark:text-white text-right text-xs">Administrasi & Pelayanan Data</span>
                        </li>
                    </ul>
                </div>

                <!-- Callout Box -->
                <div class="p-4 rounded-2xl bg-gradient-to-r from-rose-500/10 via-rose-400/5 to-amber-500/10 border border-rose-200/50 dark:border-rose-900/40">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-rosewater-500 text-white flex items-center justify-center shrink-0 shadow-sm">
                            <i class="fa-solid fa-bullseye text-sm"></i>
                        </div>
                        <p class="text-xs text-slate-700 dark:text-slate-300 leading-snug">
                            Siap mengemban tanggung jawab penuh untuk magang, PKL lanjutan, maupun pekerjaan entry-level.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- PENDIDIKAN SECTION (TIMELINE) -->
    <section id="pendidikan" class="space-y-8 scroll-mt-28">
        
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Riwayat Akademik
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Pendidikan
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                Jejak pendidikan formal yang membentuk karakter, keilmuan, dan dedikasi saya.
            </p>
        </div>

        <div class="relative max-w-4xl mx-auto">
            
            <!-- Center Line -->
            <div class="absolute left-4 sm:left-1/2 top-4 bottom-4 w-0.5 bg-gradient-to-b from-rosewater-500 via-rose-300 to-slate-200 dark:to-slate-700 -translate-x-1/2"></div>

            <div class="space-y-10">
                @foreach($cv['education'] as $index => $edu)
                    <div class="relative flex flex-col sm:flex-row items-start {{ $index % 2 == 0 ? 'sm:flex-row-reverse' : '' }} group">
                        
                        <!-- Timeline Icon Node -->
                        <div class="absolute left-4 sm:left-1/2 -translate-x-1/2 w-9 h-9 rounded-full {{ $edu['is_current'] ? 'bg-gradient-to-tr from-rosewater-500 to-rose-400 text-white shadow-lg shadow-rosewater-500/40 ring-4 ring-rose-100 dark:ring-rose-950' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-2 border-slate-300 dark:border-slate-600' }} flex items-center justify-center z-10 group-hover:scale-110 transition-transform">
                            <i class="fa-solid {{ $edu['icon'] }} text-xs"></i>
                        </div>

                        <!-- Card Content -->
                        <div class="w-full sm:w-1/2 pl-12 sm:pl-0 {{ $index % 2 == 0 ? 'sm:pl-10' : 'sm:pr-10' }}">
                            <div class="glass-card p-6 rounded-3xl shadow-card hover:shadow-soft transition-all duration-300 border {{ $edu['is_current'] ? 'border-rosewater-300/80 dark:border-rose-900/60' : 'border-rose-100/50 dark:border-slate-800' }}">
                                
                                <div class="flex items-center justify-between gap-2 mb-2">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $edu['is_current'] ? 'bg-rose-500 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300' }}">
                                        {{ $edu['period'] }}
                                    </span>
                                    <span class="text-xs font-semibold text-rose-600 dark:text-rose-400">
                                        {{ $edu['status'] }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-rosewater-600 transition-colors">
                                    {{ $edu['institution'] }}
                                </h3>

                                <div class="text-xs font-medium text-slate-500 dark:text-slate-400 mt-1">
                                    {{ $edu['degree'] }} &bull; {{ $edu['major'] }}
                                </div>

                                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-3 leading-relaxed">
                                    {{ $edu['description'] }}
                                </p>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    </section>

    <!-- PENGALAMAN PKL SECTION -->
    <section id="pengalaman" class="space-y-8 scroll-mt-28">
        
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Pengalaman Kerja Nyata
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Praktik Kerja Lapangan (PKL)
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                Pengalaman langsung di instansi pemerintah dalam pelayanan publik dan pengolahan data bantuan.
            </p>
        </div>

        @foreach($cv['experience'] as $exp)
            <div class="glass-card rounded-3xl p-6 sm:p-10 shadow-soft border border-rose-100/70 dark:border-slate-800 relative overflow-hidden group">
                
                <!-- Background Accent Glow -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-rosewater-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="space-y-6">
                    
                    <!-- Top Meta -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100 dark:border-slate-800">
                        <div class="space-y-1">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-950/60 text-xs font-bold text-rosewater-600 dark:text-rose-400">
                                <i class="fa-solid fa-landmark"></i>
                                <span>{{ $exp['badge'] }}</span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-display font-extrabold text-slate-900 dark:text-white">
                                {{ $exp['company'] }}
                            </h3>
                            <p class="text-sm sm:text-base font-semibold text-rose-600 dark:text-rose-400">
                                {{ $exp['role'] }}
                            </p>
                        </div>

                        <div class="flex flex-col sm:items-end gap-1 text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400">
                            <span class="inline-flex items-center gap-2 font-bold text-slate-700 dark:text-slate-200">
                                <i class="fa-regular fa-calendar-check text-rose-500"></i>
                                {{ $exp['period'] }}
                            </span>
                            <span class="inline-flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-slate-400"></i>
                                {{ $exp['location'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                        {{ $exp['description'] }}
                    </p>

                    <!-- Responsibilities extracted directly from image -->
                    <div class="space-y-3">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-slate-800 dark:text-white flex items-center gap-2">
                            <i class="fa-solid fa-list-check text-rosewater-600"></i>
                            <span>Tugas & Tanggung Jawab Utama:</span>
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
                            @foreach($exp['responsibilities'] as $resp)
                                <div class="p-4 rounded-2xl bg-white/70 dark:bg-slate-800/70 border border-rose-100/60 dark:border-slate-700 flex items-start gap-3.5 hover:border-rosewater-300 transition-colors">
                                    <div class="w-7 h-7 rounded-lg bg-rose-50 dark:bg-slate-700 text-rose-500 dark:text-rose-400 flex items-center justify-center shrink-0 mt-0.5">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </div>
                                    <span class="text-xs sm:text-sm text-slate-700 dark:text-slate-200 leading-relaxed">
                                        {{ $resp }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tech & Skills Tags -->
                    <div class="pt-2 flex flex-wrap items-center gap-2">
                        <span class="text-xs font-bold text-slate-500 dark:text-slate-400 mr-2">Pilar Kinerja:</span>
                        @foreach($exp['tags'] as $tag)
                            <span class="px-3 py-1 rounded-xl text-xs font-semibold bg-rose-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-rose-100/80 dark:border-slate-700">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                </div>

            </div>
        @endforeach

    </section>

    <!-- PENGALAMAN ORGANISASI SECTION -->
    <section id="organisasi" class="space-y-8 scroll-mt-28">
        
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Kepemimpinan & Kerjasama
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Pengalaman Organisasi
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                Aktif dalam kepengurusan dan kepemimpinan organisasi untuk mengasah komunikasi serta kerjasama tim.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($cv['organizations'] as $org)
                <div class="glass-card p-6 sm:p-7 rounded-3xl shadow-card hover:shadow-soft transition-all duration-300 flex flex-col justify-between border border-rose-100/50 dark:border-slate-800 group hover:-translate-y-1">
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-rosewater-500/10 to-rose-400/20 text-rosewater-600 dark:text-rose-400 flex items-center justify-center text-lg shadow-inner group-hover:scale-110 transition-transform">
                                <i class="fa-solid {{ $org['icon'] }}"></i>
                            </div>
                            <span class="text-xs font-bold px-3 py-1 rounded-full bg-rose-50 dark:bg-slate-800 text-rose-600 dark:text-rose-400">
                                {{ $org['period'] }}
                            </span>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-rosewater-600 transition-colors">
                                {{ $org['name'] }}
                            </h3>
                            <div class="text-xs font-semibold text-rose-500 dark:text-rose-400 mt-0.5">
                                {{ $org['role'] }}
                            </div>
                            <div class="text-[11px] text-slate-400 dark:text-slate-500 mt-1">
                                {{ $org['institution'] }}
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                            {{ $org['description'] }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 mt-6 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
                        <span class="font-medium">Kontribusi Aktif</span>
                        <i class="fa-solid fa-circle-check text-emerald-500"></i>
                    </div>

                </div>
            @endforeach
        </div>

    </section>

    <!-- KEAHLIAN / SKILLS SECTION -->
    <section id="keahlian" class="space-y-8 scroll-mt-28">
        
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Kompetensi & Keahlian
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Keahlian & Keterampilan
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                Keahlian teknis administrasi perkantoran serta keterampilan interpersonal yang teruji.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Technical Skills (Hard Skills) -->
            <div class="glass-card p-6 sm:p-8 rounded-3xl shadow-soft space-y-6 border border-rose-100/60 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-slate-800 text-rose-500 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-laptop-file"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Hard Skills & Perkantoran</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Aplikasi komputer & pengelolaan data terpadu</p>
                    </div>
                </div>

                <div class="space-y-5">
                    @foreach($cv['skills']['technical'] as $skill)
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-bold text-slate-800 dark:text-white flex items-center gap-2">
                                    <i class="fa-solid {{ $skill['icon'] }} text-rose-500 text-xs"></i>
                                    {{ $skill['name'] }}
                                </span>
                                <span class="text-xs font-bold text-rosewater-600 dark:text-rose-400">
                                    {{ $skill['level'] }}%
                                </span>
                            </div>
                            
                            <!-- Progress Bar -->
                            <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-rosewater-500 to-rose-400 rounded-full transition-all duration-1000"
                                     style="width: {{ $skill['level'] }}%"></div>
                            </div>
                            
                            <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-snug">
                                {{ $skill['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Soft Skills & Interpersonal -->
            <div class="glass-card p-6 sm:p-8 rounded-3xl shadow-soft space-y-6 border border-rose-100/60 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-slate-800 text-rose-500 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-handshake-angle"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white">Soft Skills & Karakter</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Integritas, komunikasi, dan dinamika tim</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($cv['skills']['soft'] as $skill)
                        <div class="p-4 rounded-2xl bg-white/70 dark:bg-slate-800/70 border border-rose-100/60 dark:border-slate-700 flex flex-col justify-between space-y-3 hover:border-rosewater-300 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-slate-700 text-rose-500 flex items-center justify-center">
                                    <i class="fa-solid {{ $skill['icon'] }} text-sm"></i>
                                </div>
                                <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/60 px-2 py-0.5 rounded-full">
                                    Teruji
                                </span>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-white">{{ $skill['name'] }}</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-snug">
                                    {{ $skill['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Dedication note -->
                <div class="p-4 rounded-2xl bg-amber-50/70 dark:bg-amber-950/30 border border-amber-200/50 dark:border-amber-900/40 text-xs text-amber-900 dark:text-amber-200 leading-relaxed flex items-center gap-3">
                    <i class="fa-solid fa-sparkles text-amber-500 text-base shrink-0"></i>
                    <span>Kombinasi ketelitian dan keramahan dalam melayani publik menghasilkan efisiensi kerja yang konsisten.</span>
                </div>

            </div>

        </div>

    </section>

    <!-- SECTION KONTAK & KIRIM PESAN -->
    <section id="kontak" class="space-y-8 scroll-mt-28">
        
        <div class="flex flex-col items-center text-center space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-rosewater-600 dark:text-rose-400 bg-rose-50 dark:bg-rose-950/60 px-3.5 py-1 rounded-full">
                Mari Terhubung
            </span>
            <h2 class="text-3xl sm:text-4xl font-display font-extrabold text-slate-900 dark:text-white">
                Kontak & Kolaborasi
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-rosewater-500 to-amber-400 rounded-full"></div>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-xl">
                Tertarik mendiskusikan peluang magang, kerja sama, atau lowongan administrasi? Silakan hubungi saya melalui saluran di bawah ini.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Contact Channels (Left) -->
            <div class="lg:col-span-5 space-y-4">
                
                <!-- Card WA -->
                <a href="{{ $cv['contact']['whatsapp_url'] }}" target="_blank"
                   class="glass-card p-5 rounded-2xl shadow-sm hover:shadow-md transition-all flex items-center gap-4 border border-rose-100/60 dark:border-slate-800 group hover:-translate-y-0.5">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">WhatsApp & Telepon</div>
                        <div class="font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 transition-colors">
                            {{ $cv['contact']['phone_display'] }}
                        </div>
                        <div class="text-[11px] text-emerald-600 font-semibold mt-0.5">Klik untuk chat langsung &rarr;</div>
                    </div>
                </a>

                <!-- Card Email -->
                <a href="mailto:{{ $cv['contact']['email'] }}"
                   class="glass-card p-5 rounded-2xl shadow-sm hover:shadow-md transition-all flex items-center gap-4 border border-rose-100/60 dark:border-slate-800 group hover:-translate-y-0.5">
                    <div class="w-12 h-12 rounded-2xl bg-rose-50 dark:bg-rose-950/60 text-rose-500 dark:text-rose-400 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email Pribadi</div>
                        <div class="font-bold text-slate-900 dark:text-white group-hover:text-rose-600 transition-colors">
                            {{ $cv['contact']['email'] }}
                        </div>
                        <div class="text-[11px] text-rose-500 font-semibold mt-0.5">Kirim email langsung &rarr;</div>
                    </div>
                </a>

                <!-- Card Lokasi -->
                <div class="glass-card p-5 rounded-2xl shadow-sm flex items-center gap-4 border border-rose-100/60 dark:border-slate-800">
                    <div class="w-12 h-12 rounded-2xl bg-sky-50 dark:bg-sky-950/60 text-sky-500 dark:text-sky-400 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Domisili</div>
                        <div class="font-bold text-slate-900 dark:text-white">{{ $cv['contact']['location'] }}</div>
                        <div class="text-[11px] text-slate-500 dark:text-slate-400 mt-0.5">Jawa Barat, Indonesia</div>
                    </div>
                </div>

                <!-- Download PDF CV Button Promo -->
                <div class="p-6 rounded-3xl bg-gradient-to-tr from-rosewater-500 to-rose-600 text-white shadow-lg shadow-rosewater-500/25 space-y-3">
                    <h4 class="font-display font-bold text-lg">Butuh Dokumen CV Siap Cetak?</h4>
                    <p class="text-xs text-white/90 leading-relaxed">
                        Versi PDF telah dioptimalkan secara otomatis untuk ukuran kertas A4 standar pelamar kerja / magang.
                    </p>
                    <a href="{{ route('cv.print') }}" target="_blank"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-rose-600 text-xs font-bold uppercase tracking-wider hover:bg-rose-50 transition-colors shadow-md">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>Buka / Download PDF Sekarang</span>
                    </a>
                </div>

            </div>

            <!-- Contact Message Form (Right) -->
            <div class="lg:col-span-7 glass-card p-6 sm:p-8 rounded-3xl shadow-soft border border-rose-100/70 dark:border-slate-800">
                
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">
                    Kirim Pesan Cepat
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">
                    Formulir ini dapat langsung meneruskan pesan ke WhatsApp Olipia atau dikirimkan melalui sistem.
                </p>

                <form action="{{ route('cv.contact') }}" method="POST" class="space-y-4" x-data="{ viaWhatsapp: true }">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                                Nama Pengirim <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="sender_name" required placeholder="Contoh: HRD PT Sinar Abadi"
                                   class="w-full px-4 py-3 rounded-2xl bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-rosewater-400 dark:focus:ring-rose-500 transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                                Email / No. Kontak
                            </label>
                            <input type="text" name="sender_email" placeholder="hrd@perusahaan.com"
                                   class="w-full px-4 py-3 rounded-2xl bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-rosewater-400 dark:focus:ring-rose-500 transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                            Perihal / Subjek <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="subject" required placeholder="Contoh: Tawaran Magang Administrasi & Data Entry"
                               class="w-full px-4 py-3 rounded-2xl bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-rosewater-400 dark:focus:ring-rose-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                            Isi Pesan <span class="text-rose-500">*</span>
                        </label>
                        <textarea name="message" rows="4" required placeholder="Tuliskan pesan, rincian tawaran, atau pertanyaan Anda..."
                                  class="w-full px-4 py-3 rounded-2xl bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-rosewater-400 dark:focus:ring-rose-500 transition-all"></textarea>
                    </div>

                    <!-- Direct WA Checkbox Option -->
                    <div class="p-3 rounded-2xl bg-rose-50/60 dark:bg-slate-800/60 border border-rose-100 dark:border-slate-700 flex items-center justify-between">
                        <label class="flex items-center gap-2.5 cursor-pointer text-xs font-medium text-slate-700 dark:text-slate-300">
                            <input type="checkbox" name="direct_whatsapp" value="1" x-model="viaWhatsapp" class="rounded text-rose-500 focus:ring-rosewater-400 w-4 h-4">
                            <span>Kirimkan pesan langsung ke WhatsApp Olipia</span>
                        </label>
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-lg"></i>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-3.5 rounded-2xl font-bold text-sm text-white bg-gradient-to-r from-rosewater-500 to-rose-600 hover:from-rosewater-600 hover:to-rose-700 shadow-md shadow-rosewater-500/25 transition-all hover:scale-[1.01] flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane" x-show="!viaWhatsapp"></i>
                        <i class="fa-brands fa-whatsapp text-lg" x-show="viaWhatsapp"></i>
                        <span x-text="viaWhatsapp ? 'Kirim Pesan via WhatsApp' : 'Kirim Pesan'"></span>
                    </button>

                </form>

            </div>

        </div>

    </section>

    <!-- MODAL / LIGHTBOX: SCAN DOKUMEN CV ASLI -->
    <div x-show="modalCv" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <div class="relative max-w-2xl w-full bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-rose-200 dark:border-slate-700 p-6 space-y-4"
             @click.away="modalCv = false">
            
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-rose-50 text-rose-500 flex items-center justify-center">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-900 dark:text-white">Dokumen Scan CV Asli</h4>
                        <p class="text-[11px] text-slate-500">Lampiran sumber data E-CV Olipia</p>
                    </div>
                </div>
                
                <button @click="modalCv = false" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-800 dark:hover:text-white flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Image preview -->
            <div class="max-h-[70vh] overflow-y-auto rounded-2xl border border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 p-2 text-center">
                <img src="{{ asset('images/cv-source.jpg') }}" alt="CV Asli Olipia" class="mx-auto rounded-lg shadow-sm max-w-full">
            </div>

            <div class="flex items-center justify-between pt-2 text-xs">
                <span class="text-slate-500">Format gambar sumber asli (723 &times; 1024)</span>
                <a href="{{ asset('images/cv-source.jpg') }}" download="CV-Olipia-Asli.jpg" 
                   class="inline-flex items-center gap-1.5 font-bold text-rose-600 hover:underline">
                    <i class="fa-solid fa-download"></i> Unduh Gambar
                </a>
            </div>

        </div>

    </div>

</div>

@endsection

