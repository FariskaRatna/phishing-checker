@extends('master')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('main-panel')

<!-- About Section -->
<section class="py-5 mt-5 bg-dark text-white " style="
         background: url('{{ asset('images/benner1.jpg') }}') center center / cover no-repeat;
         position: relative;
         overflow: hidden;
         
       ">
  <div style="
          position: absolute;
          top: 0; left: 0; width: 100%; height: 100%;
          background-color: rgba(0, 0, 0, 0.4);
          z-index: 1;
        "></div>
  <div class="container rounded  p-4">
    <!-- Overlay agar teks lebih kontras -->


    <div class="row align-items-center position-relative" style="z-index: 2;">
      <!-- Image -->
      <div class="col-md-5 text-center mb-4 mb-md-0">

        <img src="{{ asset('images/bumatara-shadow1.png') }}" class="img-fluid rounded "
          alt="Ilustrasi Deteksi Phishing" style="width:200px; " />
      </div>
      <!-- Text -->
      <div class="col-md-7">
        <h1 class="fw-bold mb-3">Lindungi Dirimu dari Phishing!</h1>
        <p class="lead">
          Bumatara membantu masyarakat Indonesia mengenali dan menghindari serangan phishing dengan teknologi
          deteksi canggih berbasis AI.
        </p>
        <p class="mt-3 fw-semibold">
          Kami adalah tim profesional di bidang keamanan siber yang berdedikasi untuk menciptakan solusi
          praktis dalam melindungi masyarakat dari ancaman siber, terutama serangan phishing.
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
      <div class="col-md-6  mb-md-0 text-center">
        <img src="{{asset('images/globe1.png')}}" alt="Visi Misi" class="img-fluid rounded"
          style="max-width: 450px;" />
      </div>
      <!-- Teks -->
      <div class="col-md-6"">
        <h3 class=" fw-bold mb-3">Visi & Misi Bumatara</h3>
        <p><strong>Visi:</strong> Menjadi garda terdepan dalam melindungi masyarakat Indonesia dari kejahatan
          siber melalui teknologi deteksi phishing yang cerdas dan adaptif.</p>
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
<section class="py-5 text-center bg-dark text-light" <div class="container">
  <h3 class="fw-bold">Komitmen Kami</h3>
  <p class="mt-3">
    Di era serba digital, kepercayaan adalah kunci. Kami berkomitmen untuk memberikan layanan deteksi URL phishing
    yang cepat, akurat, dan dapat diandalkan.
  </p>
  <p>
    Komitmen ini kami wujudkan dalam inovasi berkelanjutan dan respons cepat terhadap ancaman baru.
  </p>
  </div>
</section>

<!-- Our Value Section -->
<section class="py-5 bg-dark text-light text-center">
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
        <h2 class="fw-bold text-primary" id="stat1">0</h2>
        <p>Situs Telah Dicek</p>
      </div>
      <div class="col-md-3 stat-box mx-2 mb-3">
        <h2 class="fw-bold text-primary" id="stat2">0</h2>
        <p>Akurasi Deteksi</p>
      </div>
      <div class="col-md-3 stat-box mx-2 mb-3">
        <h2 class="fw-bold text-primary" id="stat3">0</h2>
        <p>Rata-rata waktu Deteksi</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light text-center" style="border-radius: 1rem 1rem 0 0;">
  <div class="container">
    <h2 class="section-title mb-3">Bantu Indonesia lebih aman dari phishing</h2>
    <p>Gunakan Bumatara sekarang dan sebarkan kesadaran tentang ancaman phishing.</p>
    <a href="/" class="btn btn-primary btn-lg fw-bold">Mulai Periksa URL</a>
  </div>
</section>

<hr class="m-0" style="border-top: 20px solid #fff">

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>
<script>
  function animateValue(id, end, duration, suffix = '') {
    let obj = document.getElementById(id);
    let start = 0;
    let range = end - start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let current = start;
    let timer = setInterval(function() {
      current += increment;
      obj.textContent = current.toLocaleString() + suffix;
      if (current == end) clearInterval(timer);
    }, stepTime);
  }
  document.addEventListener('DOMContentLoaded', function() {
    animateValue('stat1', 200, 1200, '+');
    animateValue('stat2', 95, 1000, '%');
    animateValue('stat3', 10, 1000, '');
  });
</script>
@endpush