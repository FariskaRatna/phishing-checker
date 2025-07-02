@extends('master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('main-panel')

<!-- About Section -->
<section class="py-5 mt-5 bg-dark text-white">
  <div class="container">
    <div class="row align-items-center">
      <!-- Image -->
      <div class="col-md-5 text-center mb-4 mb-md-0">
        <img src="{{asset('images/about.jpg')}}" class="img-fluid rounded" alt="Ilustrasi Keamanan" style="max-width: 300px;" />
      </div>
      <!-- Text -->
      <div class="col-md-7">
        <h2 class="section-title mb-3">Tentang Bumatara</h2>
        <p>
          Kami adalah tim profesional di bidang keamanan siber yang berdedikasi untuk menciptakan solusi praktis dalam melindungi masyarakat dari ancaman siber, terutama serangan phishing.
        </p>
        <p>
            Dengan pengalaman di industri keamanan digital, kami mengembangkan alat <strong>Phishing URL Check</strong> untuk membantu individu dan organisasi mengenali tautan mencurigakan melalui analisis lanjutan berbasis teknologi LLM.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Visi Misi Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <!-- Ilustrasi -->
      <div class="col-md-6 mb-4 mb-md-0 text-center">
        <img src="https://placehold.co/350x350" alt="Visi Misi" class="img-fluid rounded" />
      </div>
      <!-- Teks -->
      <div class="col-md-6">
        <h3 class="fw-bold mb-3">Visi & Misi Bumatara</h3>
        <p><strong>Visi:</strong> Menjadi garda terdepan dalam melindungi masyarakat Indonesia dari kejahatan siber melalui teknologi deteksi phishing yang cerdas dan adaptif.</p>
        <p><strong>Misi:</strong></p>
        <ul class="list-unstyled">
          <li>🔐 Mengembangkan sistem deteksi phishing berbasis AI dengan akurasi tinggi.</li>
          <li>📘 Meningkatkan kesadaran masyarakat tentang ancaman siber melalui edukasi digital.</li>
          <li>🌐 Menyediakan layanan gratis dan mudah diakses oleh siapa pun, kapan pun.</li>
          <li>⚙️ Berinovasi secara berkelanjutan untuk menghadapi teknik phishing terbaru.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Komitmen Section -->
<section class="py-5 text-center bg-white">
  <div class="container">
    <h3 class="fw-bold">Komitmen Kami</h3>
    <p class="mt-3">
      Di era serba digital, kepercayaan adalah kunci. Kami berkomitmen untuk memberikan layanan deteksi URL phishing yang cepat, akurat, dan dapat diandalkan.
    </p>
    <p>
      Komitmen ini kami wujudkan dalam inovasi berkelanjutan dan respons cepat terhadap ancaman baru.
    </p>
  </div>
</section>

<!-- Our Value Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h4 class="fw-bold mb-4">Nilai-Nilai Bumatara</h4>
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <div class="value-box bg-white p-4 rounded shadow text-dark">
        <div class="fs-2 mb-2">🛡️</div>
        <strong>Keamanan</strong>
      </div>
      <div class="value-box bg-white p-4 rounded shadow text-dark">
        <div class="fs-2 mb-2">💡</div>
        <strong>Inovasi</strong>
      </div>
      <div class="value-box bg-white p-4 rounded shadow text-dark">
        <div class="fs-2 mb-2">🔍</div>
        <strong>Transparansi</strong>
      </div>
      <div class="value-box bg-white p-4 rounded shadow text-dark">
        <div class="fs-2 mb-2">❤️</div>
        <strong>Kepedulian</strong>
      </div>
      <div class="value-box bg-white p-4 rounded shadow text-dark">
        <div class="fs-2 mb-2">♿</div>
        <strong>Aksesibilitas</strong>
      </div>
    </div>
  </div>
</section>

<!-- Statistik Ringkas -->
<section class="py-5 bg-white text-center">
  <div class="container">
    <h4 class="fw-bold mb-4">By The Numbers</h4>
    <div class="row justify-content-center">
      <div class="col-md-3 stat-box mx-2 mb-3">
        <h2 class="fw-bold text-primary">200+</h2>
        <p>Situs Telah Dicek</p>
      </div>
      <div class="col-md-3 stat-box mx-2 mb-3">
        <h2 class="fw-bold text-primary">95%</h2>
        <p>Akurasi Deteksi</p>
      </div>
      <div class="col-md-3 stat-box mx-2 mb-3">
        <h2 class="fw-bold text-primary">~10</h2>
        <p>Rata-rata waktu Deteksi</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-dark text-white text-center" style="box-shadow: inset 0px -6px 6px -6px rgba(0,0,0,0.3);">
  <div class="container">
    <h4 class="fw-bold">Bantu Indonesia lebih aman dari phishing</h4>
    <p>Gunakan Bumatara sekarang dan sebarkan kesadaran tentang ancaman phishing.</p>
    <a href="/" class="btn btn-warning fw-bold">Mulai Periksa URL</a>
  </div>
</section>

<hr class="m-0" style="border-top: 20px solid #fff">

@endsection

