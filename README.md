# PT. ADI DHARMA ABADI Website

Proyek ini berisi situs statis PT. ADI DHARMA ABADI yang siap diunggah ke cPanel tanpa proses build tambahan.

## Struktur Folder
```
assets/
  css/
    base.css
    components.css
    pages.css
  js/
    main.js
    validate.js
  images/
    placeholder.png
favicon.ico
favicon.png
manifest.json
robots.txt
sitemap.xml
.htaccess
index.html
(tentang-kami.html, layanan.html, sektor.html, galeri.html, karier.html, kontak.html, kebijakan-privasi.html, syarat-ketentuan.html)
mailer.php
```

## Penggunaan
- Edit konten HTML sesuai kebutuhan.
- Ganti gambar di `assets/images/` dengan gambar dari `https://adidharmaabadi.co.id` atau placeholder.
- Atur kredensial SMTP di `mailer.php` dan ganti file PHPMailer di `lib/PHPMailer/` dengan versi asli.

## Deploy ke cPanel
1. Login cPanel → File Manager.
2. Unggah seluruh isi repositori ke `public_html/`.
3. Isi konfigurasi SMTP pada `mailer.php`.
4. Aktifkan SSL (AutoSSL), lalu buka `.htaccess` dan aktifkan blok force HTTPS.
5. Pastikan Email Deliverability (SPF/DKIM) sudah benar.

## Optimasi
- Kompres gambar sebelum upload.
- Cache dan header keamanan sudah diatur di `.htaccess`.

## Catatan
Sertakan kebijakan privasi dan syarat ketentuan sesuai kebutuhan perusahaan.
