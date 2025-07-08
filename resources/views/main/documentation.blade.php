<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 999;
        display: none;
        background-color: #0d6efd;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 12px 14px;
        font-size: 18px;
        transition: opacity 0.3s ease;
    }
    @media (max-width: 576px) {
        .back-to-top {
            bottom: 20px;
            right: 20px;
            padding: 10px 12px;
            font-size: 16px;
        }
    }
    </style>
@endsection
@section('main-panel')

<!-- Section: Ciri-ciri Link Phishing -->
<section class="py-5 section-light pt-5 pb-4 mt-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mt-2">Ciri-ciri Umum Link Phishing</h2>
            <p class="text-muted">Jangan asal klik! Pahami tanda-tanda link phishing yang sering digunakan untuk menipu.</p>
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
                <img src="{{ asset('images/contoh-website-phishing.png') }}"  
                class="img-fluid" 
                style="width: 100%; max-width: 375px; height: auto;"
                alt="Ilustrasi Phishing">
                <small class="text-muted d-block mt-2">Contoh Situs Phishing vs Asli</small>
            </div>
        </div>
    </div>
</section>

<!-- Section: Penelitian Link Phishing -->
<section class="hero2 text-center text-white bg-dark py-5 mb-5">
    <div class="container">
        <small class="text-uppercase text-info">Data Global 2024</small>
        <h4 class="mb-4 fw-bold">Tren dan Data Phishing Terkini</h4>
        <div class="row align-items-center flex-column flex-md-row">
            <div class="col-md-6 text-end">
                <img src="{{ asset('images/phishing_world_trend_2024.png') }}" 
                     class="img-fluid rounded shadow-sm"
                     style="width: 100%; max-width: 500px; height: auto;"
                     alt="Grafik jumlah serangan phishing global per bulan selama tahun 2024">
                <small class="text-light d-block mt-2 mb-4">Sumber: APWG Q4 2024 Phishing Trends Report</small>
            </div>
            <div class="col-md-6 text-start">
                <p>
                    Berdasarkan laporan terbaru <strong>APWG (Anti-Phishing Working Group)</strong>, terjadi peningkatan signifikan dalam serangan phishing secara global. 
                    Pada kuartal keempat tahun 2024 saja, tercatat <strong>989.123 serangan phishing</strong>, meningkat dari 932.923 pada Q3 dan 877.536 pada Q2.
                    Kenaikan ini mengindikasikan tren lonjakan ancaman phishing menjelang tahun 2025.
                </p>
                <p>
                    Di tahun 2024, <strong>Indonesia menempati peringkat ke-2</strong> di Asia Tenggara dengan <strong>85.908 kasus phishing</strong>,
                    hanya di bawah Thailand. Hingga Mei 2025, laporan penipuan digital meningkat menjadi <strong>128.281 kasus</strong> yang mencakup phishing,
                    investasi bodong, dan penipuan pinjaman online.
                </p>
                <p>
                    <strong>Data visual:</strong> <a href="https://apwg.org/trendsreports/" target="_blank" class="text-warning">Lihat laporan tren phishing</a>
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Section: Penelitian & Studi -->
<section class="section-light pt-4 pb-4 bg-section-light text-center">
    <div class="container">
        <h4 class="mb-4 fw-bold">Penelitian dan Studi Terkait</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-center">
                    Sejumlah studi dalam tiga tahun terakhir menunjukkan bahwa pendekatan berbasis kecerdasan buatan (AI),
                    khususnya <strong>machine learning</strong> dan <strong>deep learning</strong>, terbukti efektif dalam 
                    mendeteksi phishing. Penelitian oleh He et al. (2024) menunjukkan bahwa kombinasi fitur domain dan algoritma 
                    seperti <em>Random Forest</em> mampu mencapai akurasi deteksi di atas 95%. Studi ini menekankan pentingnya 
                    analisis struktur URL dan konten email sebagai indikator utama serangan phishing.
                </p>
                <ul class="list-unstyled text-center">
                    <li><a href="https://www.sciencedirect.com/science/article/pii/S1877050925015327" target="_blank">Elsevier</a>: Deteksi phishing berbasis struktur domain dan URL</li>
                    <li><a href="https://ieeexplore.ieee.org/abstract/document/10458116" target="_blank">IEEE</a>: Deep learning untuk klasifikasi email phishing</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- Section: Solusi BUMATARA -->
<section class="section-light text-center pt-5 pb-4 bg-light">
    <div class="container">
        <small class="text-muted text-uppercase">Solusi Kami</small>
        <h4 class="mb-4 fw-bold">Bagaimana <span class="text-primary">BUMATARA</span> Mendeteksi Phishing?</h4>
        <p class="fw-medium text-dark">
            BUMATARA menganalisis struktur domain, konten HTML, dan perilaku redirect URL secara otomatis. Sistem <strong>AI kami</strong> memadukan
            <strong>validasi pola URL</strong>, <strong>cek database phishing</strong>, dan <strong>analisis konten</strong> untuk menghasilkan
            <em>prediksi tingkat keamanan</em> secara real-time dan akurat.
        </p>
        <img src="{{ asset('images/bumatara-flow-blue.png') }}"
        class="img-fluid bumatara-flow mx-auto d-block" 
        style="max-width: 700px;" 
        data-aos="fade-up" 
        data-aos-delay="150" 
        alt="Alur proses BUMATARA mendeteksi phishing dari input URL, klasifikasi AI, analisis konten, hingga hasil aman atau phishing">
    </div>
</section>

<!-- Section: Tips Aman -->
<section class="section-light pt-4 pb-4">
    <div class="container">
        <h4 class="mb-4 fw-bold text-center">
        <i class="bi bi-shield-check text-success me-2"></i>Tips Aman Saat Browsing
        </h4>
        <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                Periksa domain dan pastikan tidak ada karakter mencurigakan
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                Jangan isi form login dari link yang tidak kamu minta
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                <span>Selalu cek apakah URL menggunakan <strong>https://</strong></span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                <span>Gunakan platform <strong>BUMATARA</strong> untuk memverifikasi URL secara gratis</span>
            </li>
        </ul>
    </div>
</section>


<!-- Section: CTA -->
<section class="text-center pt-4 pb-4 bg-light">
    <div class="container">
        <h4 class="mb-3 fw-bold">Sudah Tahu Tanda-Tanda Phishing?</h4>
        <p class="mb-3">Gunakan <strong>BUMATARA</strong> untuk cek URL mencurigakan secara instan dan gratis.</p>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("backToTopBtn");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 500) {
                btn.style.display = "block";
            } else {
                btn.style.display = "none";
            }
        });

        btn.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });
</script>
@endpush
@section('footer-panel')
<a href="#" class="btn btn-primary rounded-circle shadow back-to-top" id="backToTopBtn">
    <i class="bi bi-arrow-up-short fs-4"></i>
</a>
@endsection
