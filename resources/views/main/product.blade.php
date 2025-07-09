<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('head')

@endsection
@section('main-panel')

<!-- Pricing Section -->
<section class="py-5 bg-dark text-light pt-5 mt-5">
  <div class="container text-center">
    <h1 class="fw-bold">Pilih Paket Sesuai Kebutuhanmu</h1>
    <p class="mb-5">Lindungi bisnismu dan datamu dengan harga terjangkau</p>

    <div class="row g-4">
      <!-- Paket Free -->
      <div class="col-md-4">
        <div class="bg-white text-dark p-4 pricing-card h-100">
          <h4 class="fw-bold">Paket Free</h4>
          <ul class="list-unstyled mt-3 mb-4">
            <li>✔️ Cek hingga 15
              URL / bulan
            </li>
            <li>✔️ Deteksi phishing dasar</li>
            <li>✔️ Laporan singkat</li>
            <li>✔️ Enkripsi koneksi (HTTPS)</li>
          </ul>

          <a type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal"
            data-bs-target="#signupModal">Coba Gratis</a>
        </div>
      </div>

      <!-- Paket Pro -->
      <div class="col-md-4">
        <div class="bg-white text-dark p-4 pricing-card h-100 border border-primary">
          <h4 class="fw-bold">Paket Pro</h4>
          <ul class="list-unstyled mt-3 mb-4">
            <li>✔️ Cek hingga 200 URL / bulan</li>
            <li>✔️ Dukungan via email</li>
            <li>✔️ Deteksi lanjutan (ML)</li>
            <li>✔️ Notifikasi URL berisiko</li>
          </ul>

          <a type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
            data-bs-target="#proModal">Beli Paket</a>
        </div>
      </div>

      <!-- Paket Enterprise -->
      <div class="col-md-4">
        <div class="bg-white text-dark p-4 pricing-card h-100">
          <h4 class="fw-bold">Paket Enterprise</h4>
          <ul class="list-unstyled mt-3 mb-4">
            <li>✔️ Cek tanpa batas</li>
            <li>✔️ Integrasi API</li>
            <li>✔️ Monitoring real-time</li>
            <li>✔️ Dukungan prioritas 24/7</li>
          </ul>
          <a type="button" class="btn btn-outline-primary
           w-100" data-bs-toggle="modal" data-bs-target="#proModal">Hubungi Tim Kami</a>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold">FAQ</h2>

    <div class="accordion" id="faqAccordion">
      <!-- FAQ 1 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
            aria-expanded="true" aria-controls="collapse1">
            Apakah saya bisa membatalkan kapan saja?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Ya, semua langganan dapat dibatalkan kapan saja tanpa biaya tambahan.
          </div>
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            Apa bedanya deteksi dasar dan lanjutan?
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Deteksi lanjutan menggunakan machine learning dan database phishing global,
            yang lebih akurat dan dapat mendeteksi pola phishing terbaru.
          </div>
        </div>
      </div>

      <!-- FAQ 3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            Apakah data URL saya aman?
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3"
          data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Ya, kami tidak menyimpan URL atau data pribadi Anda. Semua proses dilakukan secara aman dan
            dienkripsi.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Bagaimana Cara Kerja Produk Kami?</h2>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">1️⃣ Validasi URL</h5>
          <p>Memastikan URL memiliki struktur yang valid dan aman untuk diproses sebelum dianalisis lebih
            lanjut.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">2️⃣ Pengecekan Database Phishing</h5>
          <p>URL dicocokkan dengan database phishing global seperti PhishTank, Google Safe Browsing, dan
            database internal.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">3️⃣ Analisis AI & Machine Learning</h5>
          <p>Model AI mendeteksi pola phishing berdasarkan struktur domain, URL pendek, karakteristik
            mencurigakan, hingga metadata URL.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Bagaimana Cara Kerja Produk Kami?</h2>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">1️⃣ Validasi URL</h5>
          <p>Memastikan URL memiliki struktur yang valid dan aman untuk diproses sebelum dianalisis lebih
            lanjut.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">2️⃣ Pengecekan Database Phishing</h5>
          <p>URL dicocokkan dengan database phishing global seperti PhishTank, Google Safe Browsing, dan
            database internal.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="p-4 border rounded shadow-sm">
          <h5 class="fw-bold">3️⃣ Analisis AI & Machine Learning</h5>
          <p>Model AI mendeteksi pola phishing berdasarkan struktur domain, URL pendek, karakteristik
            mencurigakan, hingga metadata URL.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Kenapa Memilih Produk Kami?</h2>
    <div class="row text-center">
      <div class="col-md-3 mb-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-bold">✅ Akurasi Tinggi</h5>
          <p>Didukung oleh teknologi AI terbaru dengan tingkat akurasi hingga 98% dalam mendeteksi phishing.
          </p>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-bold">🚀 Cepat & Real-Time</h5>
          <p>Proses pengecekan hanya dalam hitungan detik dengan hasil yang akurat dan cepat.</p>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-bold">🔗 Integrasi Mudah</h5>
          <p>API fleksibel yang dapat disesuaikan dengan berbagai platform dan sistem backend.</p>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="p-4 border rounded h-100">
          <h5 class="fw-bold">🛡️ Privasi Terjamin</h5>
          <p>Data URL tidak disimpan. Semua proses dienkripsi dan sesuai dengan standar keamanan global.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-dark text-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Apa Kata Pengguna Kami?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <p>"Sejak menggunakan layanan ini, tim kami berhasil mengurangi insiden klik link phishing hingga
            95%!"</p>
          <h6 class="mt-3 fw-bold">— PT SecureTech</h6>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <p>"API-nya mudah diintegrasikan ke sistem internal kami. Sangat membantu dan cepat."</p>
          <h6 class="mt-3 fw-bold">— Tech Innovate</h6>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded h-100">
          <p>"Dashboard-nya sangat informatif. Bisa pantau ancaman phishing secara real-time dengan sangat
            mudah."</p>
          <h6 class="mt-3 fw-bold">— CyberShield Indonesia</h6>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Konfirmasi Paket Pro -->
<div class="modal fade" id="proModal" tabindex="-1" aria-labelledby="proModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="proModalLabel">Dapatkan Paket Pro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body text-center">
        <p class="fs-5">Untuk mendapatkan <strong>Paket Pro</strong>, silakan konfirmasi ke email berikut:</p>
        <p class="fw-bold text-primary fs-4">contact@bumarata.com</p>
        <p>Kami akan memproses permintaan Anda sesegera mungkin.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <!-- Name -->
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
              name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
              name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
              id="password" name="password" required autocomplete="new-password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Confirm Password -->
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation"
              name="password_confirmation" required autocomplete="new-password">
          </div>

          <!-- Submit -->
          <button type="submit" class="btn btn-primary w-100">Sign Up</button>

          <!-- Already registered -->
          <!-- <div class="text-center mt-3">
                            <a href="{{ route('login') }}">Already registered? Login</a>
                        </div> -->
        </form>

      </div>
    </div>
  </div>
</div>


@endsection

@push('scripts')
@endpush
@section('footer-panel')

@endsection