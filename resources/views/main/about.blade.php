<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('main-panel')



<section class="hero2" style=" margin: top 100px;">
    <div class="container" style="height: 100px;">
        <div class="row align-items-center">
            <!-- Gambar -->
            <div class="col-md-4 text-center">
                <img src="https://placehold.co/200x200.png" alt="Gambar" class="about-img mb-4 mb-md-0"
                    style="bottom:-120px; position: absolute; right: 65%;">
            </div>

            <!-- Teks judul & deskripsi -->
            <div class="col-md-8 about-text text-start">
                <h2 class="fw-bold">About US</h2>
                <p class="mb-0">
                    We reimagine cybersecurity to ensure everyone can protect themselves online, enhancing safety
                    for individuals and businesses alike.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION PARAGRAF LANJUTAN -->
<section class="py-4 bg-white">
    <div class="container">
        <div class="row">
            <!-- Dikasih offset agar sejajar dengan teks atas -->
            <div class="col-md-8 offset-md-4">
                <p>
                    Kami adalah tim profesional di bidang keamanan siber yang berdedikasi untuk menciptakan solusi
                    praktis dalam melindungi masyarakat dari ancaman siber, terutama serangan phishing. Dengan
                    pengalaman lebih dari 10 tahun dalam industri keamanan digital, kami membangun alat Phishing URL
                    Check untuk membantu individu dan perusahaan mengidentifikasi tautan mencurigakan sebelum
                    menjadi korban.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Komitmen Section -->
<section class="py-5 px-4">
    <div class="container text-center">
        <h3 class="fw-bold">Komitmen kami</h3>
        <p class="mt-3">
            Di era serba digital, kepercayaan adalah kunci. Kami berkomitmen untuk memberikan layanan deteksi URL
            phishing yang cepat, akurat, dan dapat diandalkan. Kami percaya bahwa setiap orang berhak merasa aman
            saat menjelajahi internet.
        </p>
        <p>
            Komitmen ini kami wujudkan dalam inovasi berkelanjutan dan respons cepat terhadap ancaman baru.
        </p>
    </div>
</section>

<!-- Our Value Section -->
<section class="py-5 bg-dark">
    <div class="container text-center">
        <h4 class="fw-bold mb-4" style="color: white;">Our Value</h4>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <div class="value-box bg-white text-dark text-center p-4 rounded shadow" style="width: 160px;">
                <div class="value-icon fs-1">🛡️</div>
                <strong>Keamanan</strong>
            </div>
            <div class="value-box bg-white text-dark text-center p-4 rounded shadow" style="width: 160px;">
                <div class="value-icon fs-1">💡</div>
                <strong>Inovasi</strong>
            </div>
            <div class="value-box bg-white text-dark text-center p-4 rounded shadow" style="width: 160px;">
                <div class="value-icon fs-1">🔍</div>
                <strong>Transparansi</strong>
            </div>
            <div class="value-box bg-white text-dark text-center p-4 rounded shadow" style="width: 160px;">
                <div class="value-icon fs-1">❤️</div>
                <strong>Kepedulian</strong>
            </div>
            <div class="value-box bg-white text-dark text-center p-4 rounded shadow" style="width: 160px;">
                <div class="value-icon fs-1">♿</div>
                <strong>Aksesibilitas</strong>
            </div>
        </div>
    </div>
</section>


<!-- Letter from CEO and Email Subscription -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Kiri: Judul dan Tombol -->
            <div class="col-md-5 mb-4 mb-md-0">
                <h2 class="fw-bold display-5">Our Letter<br>from Our CEO</h2>
                <button class="btn btn-dark mt-3">Read Letter</button>
            </div>

            <!-- Garis vertikal -->
            <div class="col-md-1 d-none d-md-flex justify-content-center">
                <div style="width: 2px; height: 100px; background-color: black;"></div>
            </div>

            <!-- Kanan: Teks dan Form -->
            <div class="col-md-6">
                <p class="fw-semibold">Pastikan Setiap tautan aman,<br>Menjadi Aman dan Tumbuh Bersama kami</p>

                <form class="d-flex mt-3">
                    <input type="email" class="form-control rounded-pill me-2" placeholder="Masukkan Email di sini">
                    <button type="submit" class="btn btn-dark rounded-pill">Dapatkan Penawaran</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@endpush
@section('footer-panel')

@endsection