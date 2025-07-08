<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection
@section('main-panel')

<!-- Section: Ciri-ciri Link Phishing -->
<section class="py-5 section-light pt-5 pb-5 mt-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mt-2">Ciri-ciri Umum Link Phishing</h2>
            <p class="text-muted">Kenali tanda-tanda berikut untuk menghindari jebakan siber saat browsing.</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="bi bi-shield-exclamation text-danger me-2"></i>
                        Domain menyerupai nama resmi seperti <code>tokopedia.net</code> atau <code>google.com</code>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-exclamation-triangle text-warning me-2"></i>
                        Penggunaan karakter asing atau unicode (contoh: <code>xn--oogle-nza.com</code>)
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-arrow-repeat text-info me-2"></i>
                        Redirect ke banyak halaman yang tidak relevan
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-person-lock text-secondary me-2"></i>
                        Form login tersembunyi atau mendadak muncul
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-unlock text-muted me-2"></i>
                        Tidak menggunakan HTTPS
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <img src="/images/phishing-warning.png" class="img-fluid" alt="Ilustrasi Phishing">
                <small class="text-muted d-block mt-2">Gambar tampilan website phishing yang menyerupai asli</small>
            </div>
        </div>
    </div>
</section>

<!-- Section: Tren & Data Phishing -->
<section class="hero2 text-center text-white bg-dark py-5">
    <div class="container">
        <small class="text-uppercase text-info">Data Global 2024</small>
        <h4 class="mb-4 fw-bold">Tren dan Data Phishing Terkini</h4>
        <div class="row align-items-center">
            <div class="col-md-6 text-end">
                <img src="https:APAYA.COM" class="img-fluid" alt="Ilustrasi Phishing">
            </div>
            <div class="col-md-6 text-start">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                    <strong>Data visual:</strong> <a href="https:APAYA.COM" target="_blank" class="text-warning">Lihat laporan tren phishing</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section: Penelitian & Studi -->
<section class="section-light pt-5 pb-5 bg-section-light">
    <div class="container">
        <small class="text-muted text-uppercase">Validasi Akademik</small>
        <h4 class="mb-4 text-center fw-bold">Penelitian dan Studi Terkait</h4>
        <div class="row">
            <div class="col-md-6">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <ul>
                    <li><a href="https:APAYA.COM" target="_blank">IEEE Xplore</a>: Deteksi phishing menggunakan fitur domain</li>
                    <li><a href="https:APAYA.COM" target="_blank">Elsevier</a>: AI untuk mitigasi risiko link berbahaya</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="https:APAYA.COM" class="img-fluid" alt="Ilustrasi Penelitian">
            </div>
        </div>
    </div>
</section>

<!-- Section: Solusi BUMATARA -->
<section class="section-light text-center pt-5 pb-5 bg-light">
    <div class="container">
        <small class="text-muted text-uppercase">Solusi Kami</small>
        <h4 class="mb-4 fw-bold">Bagaimana BUMATARA Mendeteksi Phishing</h4>
        <p class="mb-4">
            BUMATARA menganalisis URL dari sisi struktur domain, konten HTML, dan perilaku redirect.
            Kami memadukan <strong>validasi pola URL</strong>, pengecekan terhadap <strong>database phishing terpercaya</strong>, serta <strong>analisis berbasis AI</strong>
            untuk menghasilkan <em>confidence score</em> yang akurat.
        </p>
        <img src="https:APAYA.COM" class="img-fluid" style="max-height: 250px;">
    </div>
</section>

<!-- Section: Tips Aman -->
<section class="section-light pt-5 pb-5">
    <div class="container">
        <small class="text-muted text-uppercase">Tips Praktis</small>
        <h4 class="mb-4 fw-bold text-center">Tips Aman Saat Browsing</h4>
        <ul class="list-group">
            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Periksa domain dan pastikan tidak ada karakter mencurigakan</li>
            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Jangan isi form login dari link yang tidak kamu minta</li>
            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Selalu cek apakah URL menggunakan <strong>https://</strong></li>
            <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i> Gunakan platform BUMATARA untuk memverifikasi URL secara gratis</li>
        </ul>
    </div>
</section>

<!-- Section: CTA -->
<section class="text-center pt-5 pb-5 bg-light">
    <div class="container">
        <h4 class="mb-3 fw-bold">Sudah Tahu Tanda-Tanda Phishing?</h4>
        <p class="mb-4">Gunakan BUMATARA untuk cek URL mencurigakan secara instan dan gratis.</p>
        <a href="/" class="btn btn-warning fw-bold">Mulai Periksa URL</a>
        <small class="text-muted d-block mt-2">Gratis, cepat, dan tanpa perlu login</small>
    </div>
</section>
@endsection

@push('scripts')
<script src="/java.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endpush
@section('footer-panel')

@endsection
