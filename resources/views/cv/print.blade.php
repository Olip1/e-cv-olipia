<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - {{ $cv['full_name'] }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .cv-page {
            width: 210mm;
            min-height: 297mm;
            margin: 20px auto;
            background: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 30mm 20mm 20mm 20mm;
            box-sizing: border-box;
            position: relative;
        }

        @media print {
            body {
                background: #ffffff;
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .cv-page {
                width: 100%;
                min-height: 100vh;
                margin: 0;
                padding: 15mm 15mm;
                box-shadow: none;
            }
            @page {
                size: A4;
                margin: 10mm;
            }
        }
    </style>
</head>
<body class="py-6">

    <!-- Print Control Bar -->
    <div class="no-print max-w-[210mm] mx-auto mb-4 px-4 flex items-center justify-between">
        <a href="{{ route('cv.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-rose-600 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Web E-CV
        </a>
        <div class="flex items-center gap-3">
            <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold shadow-md shadow-rose-600/30 transition-all">
                <i class="fa-solid fa-print"></i> Cetak / Simpan ke PDF
            </button>
        </div>
    </div>

    <!-- CV Document Sheet (A4 Styled) -->
    <div class="cv-page">
        
        <div class="grid grid-cols-12 gap-8 items-start">
            
            <!-- Left Column (35%) -->
            <div class="col-span-4 space-y-6 border-r border-slate-200 pr-6">
                
                <!-- Pas Foto -->
                <div class="w-full aspect-[3/4] max-w-[170px] mx-auto rounded-lg overflow-hidden border border-slate-300 shadow-sm">
                    <img src="{{ asset('images/olipia-pas-foto.jpg') }}" alt="{{ $cv['full_name'] }}" class="w-full h-full object-cover">
                </div>

                <!-- Kontak -->
                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3 text-xs text-slate-700">
                        <div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center shrink-0 text-slate-600">
                            <i class="fa-solid fa-phone text-[11px]"></i>
                        </div>
                        <span class="font-medium">{{ $cv['contact']['phone'] }}</span>
                    </div>

                    <div class="flex items-center gap-3 text-xs text-slate-700">
                        <div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center shrink-0 text-slate-600">
                            <i class="fa-solid fa-envelope text-[11px]"></i>
                        </div>
                        <span class="font-medium break-all">{{ $cv['contact']['email'] }}</span>
                    </div>

                    <div class="flex items-center gap-3 text-xs text-slate-700">
                        <div class="w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center shrink-0 text-slate-600">
                            <i class="fa-solid fa-location-dot text-[11px]"></i>
                        </div>
                        <span class="font-medium">{{ $cv['contact']['location'] }}</span>
                    </div>
                </div>

                <!-- Keahlian -->
                <div class="space-y-2.5 pt-3">
                    <h3 class="text-xs font-extrabold uppercase tracking-widest text-slate-900 border-b-2 border-slate-900 pb-1">
                        Keahlian
                    </h3>
                    <ul class="space-y-1.5 text-xs text-slate-700 list-disc list-inside leading-relaxed">
                        <li>Input dan pengelolaan data</li>
                        <li>Microsoft Office (Word, Excel)</li>
                        <li>Komunikasi yang baik</li>
                        <li>Teliti dan detail</li>
                        <li>Mampu bekerja dalam tim</li>
                        <li>Problem solving</li>
                        <li>Pengarsipan dokumen</li>
                    </ul>
                </div>

                <!-- Pengalaman Organisasi -->
                <div class="space-y-2.5 pt-3">
                    <h3 class="text-xs font-extrabold uppercase tracking-widest text-slate-900 border-b-2 border-slate-900 pb-1">
                        Pengalaman Organisasi
                    </h3>
                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-start gap-1.5">
                            <span class="text-slate-400 mt-1">&bull;</span>
                            <div>
                                <span class="font-bold text-slate-900">Ketua PMR</span>
                                <span class="text-[11px] text-slate-500 block">2023</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-1.5">
                            <span class="text-slate-400 mt-1">&bull;</span>
                            <div>
                                <span class="font-bold text-slate-900">OSIS</span>
                                <span class="text-[11px] text-slate-500 block">2022 - 2023</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-1.5">
                            <span class="text-slate-400 mt-1">&bull;</span>
                            <div>
                                <span class="font-bold text-slate-900">HIMASI (Himpunan Mahasiswa Sistem Informasi)</span>
                                <span class="text-[11px] text-slate-500 block">2025 - Sekarang</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Right Column (65%) -->
            <div class="col-span-8 space-y-6">
                
                <!-- Header Name -->
                <div class="pb-3 border-b-2 border-slate-900">
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 uppercase">
                        {{ $cv['full_name'] }}
                    </h1>
                    <p class="text-xs font-semibold text-rose-600 mt-1">
                        {{ $cv['status'] }} &bull; Administrasi & Pengolahan Data
                    </p>
                </div>

                <!-- Tentang Saya -->
                <div class="space-y-2">
                    <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-900">
                        Tentang Saya
                    </h2>
                    <p class="text-xs text-slate-700 leading-relaxed text-justify">
                        {{ $cv['about']['summary'] }} {{ $cv['about']['description'] }}
                    </p>
                </div>

                <!-- Pendidikan -->
                <div class="space-y-3">
                    <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-900 border-b border-slate-200 pb-1">
                        Pendidikan
                    </h2>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-start justify-between">
                            <span class="w-28 font-bold text-slate-700 shrink-0">2024 - Sekarang</span>
                            <div class="flex-1">
                                <span class="font-bold text-slate-900 uppercase">UNIVERSITAS BINA SARANA INFORMATIKA (UBSI)</span>
                                <span class="text-[11px] text-slate-600 block">Kampus Kota Tasikmalaya - Mahasiswi Aktif</span>
                            </div>
                        </div>

                        <div class="flex items-start justify-between">
                            <span class="w-28 font-bold text-slate-700 shrink-0">2021 - 2024</span>
                            <div class="flex-1">
                                <span class="font-bold text-slate-900 uppercase">SMKN 1 MALAUSMA</span>
                            </div>
                        </div>

                        <div class="flex items-start justify-between">
                            <span class="w-28 font-bold text-slate-700 shrink-0">2018 - 2021</span>
                            <div class="flex-1">
                                <span class="font-bold text-slate-900 uppercase">SMPN 1 SUKAMANTRI</span>
                            </div>
                        </div>

                        <div class="flex items-start justify-between">
                            <span class="w-28 font-bold text-slate-700 shrink-0">2012 - 2018</span>
                            <div class="flex-1">
                                <span class="font-bold text-slate-900 uppercase">SDN 1 TENGGERRAHARJA</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengalaman -->
                <div class="space-y-3 pt-2">
                    <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-900 border-b border-slate-200 pb-1">
                        Pengalaman Kerja & PKL
                    </h2>
                    
                    <div class="space-y-2 text-xs">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-slate-900 text-[13px]">Praktik Kerja Lapangan (PKL)</span>
                                <span class="text-[11px] font-semibold text-slate-500 italic">Februari - April 2023</span>
                            </div>
                            <span class="font-semibold text-rose-600 block">Dinas Sosial Majalengka</span>
                            <span class="text-slate-700 text-[11px] font-medium block mt-0.5">Bagian: Pelayanan (Input Data)</span>
                        </div>

                        <ul class="space-y-1.5 text-xs text-slate-700 list-disc list-inside pl-1 leading-relaxed">
                            <li>Melakukan input data penerima bantuan sosial ke dalam Microsoft Excel secara akurat.</li>
                            <li>Mengelola dan memperbarui data penerima bantuan sesuai dengan ketentuan yang berlaku.</li>
                            <li>Berkoordinasi dengan staf bagian pelayanan dalam menyelesaikan data yang dibutuhkan.</li>
                            <li>Membantu dalam pengarsipan surat masuk, keluar, dan dokumen administrasi kedinasan.</li>
                        </ul>
                    </div>
                </div>

                <!-- Tanda Tangan / Penutup Singkat -->
                <div class="pt-8 flex justify-end">
                    <div class="text-center text-xs space-y-12">
                        <span class="text-slate-500 block">Ciamis, {{ date('d F Y') }}</span>
                        <div class="border-t border-slate-400 pt-1">
                            <span class="font-bold text-slate-900">{{ $cv['full_name'] }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>
