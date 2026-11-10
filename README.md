# 🌸 E-CV & Portofolio Online - Olipia (Mahasiswi UBSI)

Aplikasi **E-Curriculum Vitae (E-CV)** modern, elegan, dan profesional yang dirancang khusus untuk mahasiswi aktif semester akhir / calon lulusan baru (fresh graduate). Dibangun menggunakan **Laravel 12**, **Tailwind CSS**, dan **Alpine.js**, serta telah dioptimasi penuh agar **100% siap dideploy ke Vercel Serverless**.

---

## ✨ Fitur Utama

- 🎨 **Tema Elegan & Estetik**: Palet warna *Rosewater, Blush, & Sage* yang lembut, rapi, dan profesional, sangat cocok bagi mahasiswi.
- 📱 **Responsif & Mobile-Friendly**: Tampilan nyaman dibuka melalui smartphone, tablet, maupun laptop/desktop.
- 🌙 **Dark Mode & Light Mode**: Tombol sakelar tema interaktif dengan transisi halus.
- 💬 **Integrasi Direct WhatsApp & Email**: Calon recruiter / HRD dapat langsung menghubungi via WhatsApp (`085879042470`) dengan pesan pembuka otomatis.
- 🖨️ **Format Siap Cetak / Unduh PDF (A4)**: Dilengkapi halaman `/print` dengan CSS `@media print` presisi ukuran A4 untuk disimpan sebagai berkas PDF resmi.
- 🔍 **Modal Lightbox Scan Dokumen Asli**: Fitur untuk melihat lampiran scan CV fisik asli secara langsung.
- ⚙️ **Konfigurasi Terpusat**: Seluruh data profil, keahlian, riwayat pendidikan, dan pengalaman tersimpan rapi di [`config/cv.php`](config/cv.php), memudahkan pengubahan data kapan saja.
- ⚡ **Vercel Serverless Ready**: Dikonfigurasi dengan `vercel.json` dan `api/index.php` yang mengalihkan caching & compile views ke `/tmp` (ramah terhadap *read-only filesystem* Vercel).

---

## 🗂️ Isi Data CV (Berdasarkan Dokumen Terlampir)

1. **Identitas**: Olipia (Mahasiswi Aktif UBSI Kampus Kota Tasikmalaya - Sistem Informasi)
2. **Kontak**: 
   - No. HP/WA: `085879042470`
   - Email: `iaolip36@gmail.com`
   - Domisili: `Sukamantri, Ciamis, Jawa Barat`
3. **Pendidikan**:
   - 2024 - Sekarang: Universitas Bina Sarana Informatika (UBSI) Kampus Kota Tasikmalaya
   - 2021 - 2024: SMKN 1 Malausma
   - 2018 - 2021: SMPN 1 Sukamantri
   - 2012 - 2018: SDN 1 Tenggerraharja
4. **Pengalaman Praktik Kerja Lapangan (PKL)**:
   - **Dinas Sosial Majalengka** (Februari - April 2023)
   - Bagian: Pelayanan & Input Data
   - *Tanggung Jawab*: Input data penerima bantuan ke Excel, update & validasi data, koordinasi pelayanan publik, pengarsipan surat kedinasan.
5. **Pengalaman Organisasi**:
   - Anggota HIMASI (Himpunan Mahasiswa Sistem Informasi) (2025 - Sekarang)
   - Ketua PMR (Palang Merah Remaja) (2023)
   - Pengurus OSIS (2022 - 2023)
6. **Keahlian**:
   - Input dan Pengelolaan Data, Microsoft Excel, Microsoft Word, Pengarsipan Dokumen, Komunikasi Efektif, Teliti & Detail, Teamwork, Problem Solving.

---

## 💻 Menjalankan di Lokal (Laragon / Terminal)

Pastikan PHP 8.2+ dan Composer telah terpasang.

1. **Jalankan melalui Artisan Serve**:
   ```bash
   php artisan serve
   ```
   Buka peramban di `http://127.0.0.1:8000`

2. **Atau melalui Laragon (Virtual Host)**:
   Karena project ini berada di `C:\laragon\www\E CV`, Anda dapat langsung mengaksesnya melalui URL Laragon lokal (contoh: `http://e-cv.test` atau sesuai konfigurasi Laragon).

---

## 🚀 Panduan Deploy ke Vercel

Project ini sudah dilengkapi konfigurasi serverless:
- `vercel.json`
- `api/index.php`
- `.vercelignore`

### Cara 1: Deploy Otomatis via GitHub (Direkomendasikan)

1. Buat repository baru di [GitHub](https://github.com/new) (misal: `e-cv-olipia`).
2. Hubungkan dan push kode lokal ke GitHub:
   ```bash
   git add .
   git commit -m "feat: initial commit e-cv laravel siap vercel"
   git branch -M main
   git remote add origin https://github.com/USERNAME_ANDA/e-cv-olipia.git
   git push -u origin main
   ```
3. Buka dashboard [Vercel](https://vercel.com) dan klik **Add New Project**.
4. Import repository GitHub tersebut.
5. Pada bagian **Environment Variables**, tambahkan:
   - `APP_KEY` : `base64:7Ijq4rOYYuHYl4Kr5rD/0wLzcTgbwU1U1fpATKIMotU=`
   - `APP_ENV` : `production`
   - `APP_DEBUG` : `false`
   - `APP_URL` : `https://nama-project-anda.vercel.app`
6. Klik **Deploy**! Website E-CV Olipia akan langsung online dengan domain HTTPS gratis dari Vercel.

### Cara 2: Deploy Cepat via Vercel CLI

1. Pasang Vercel CLI:
   ```bash
   npm install -g vercel
   ```
2. Login dan deploy:
   ```bash
   vercel
   ```
3. Ikuti petunjuk di terminal hingga proses deploy selesai.

---

## 📄 Lisensi
Dibuat dengan ❤️ untuk Olipia. Bebas dikembangkan lebih lanjut.
