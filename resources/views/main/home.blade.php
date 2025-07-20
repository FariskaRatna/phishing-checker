<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('main-panel')

<!-- Hero Section -->
<section class="hero">
    <h2 class="mb-3">🔍 DMARC Uji Pull</h2>
    <p>Domain-based Message Authentication, Reporting, and Conformance</p>

    <h1 class="display-5 fw-bold">Phishing URL checker</h1>
    <p class="lead mb-4">Our phishing URL checker detects if a URL is malicious or contains a phishing link.</p>
    <div class="url-checker-box">
        <div class="text-end">
            <p class="text-muted" style=" text-align: right;  color: black;">Quota Check : {{ session('quota') }}</p>
        </div>
        <p class="text-muted mt-2 text-center">Detect if a URL has a phishing link or is malicious.</p>
        <form class="d-flex" id="singleForm">
            <input type="hidden" id="quota" value="{{ session('quota') }}">
            <input type="text" name="url" id="url" class="form-control me-2" placeholder="example.com">
            <button class="btn btn-primary" type="submit">Scan</button>
        </form>
        <div id="singleResult" class="result"></div>


    </div>
</section>

<!-- Quotes Section -->
<div class="container my-5">
    <div class="row" style="padding-top: 30px;">
        <!-- LEFT: FAQ Style -->
        <div class="col-md-6">
            <h4>Kenapa perlu cek URL Phishing?</h4>
            <div class="accordion mt-3" id="phishingFAQ">
                <div class="accordion mt-3" id="phishingFAQ">
                    <div class="accordion-item">

                        <h2 class="accordion-header" id="q1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a1" aria-expanded="false" aria-controls="a1">
                                Apa itu URL phishing?
                            </button>
                        </h2>
                        <div id="a1" class="accordion-collapse collapse" aria-labelledby="q1">
                            <div class="accordion-body">
                                URL phishing adalah tautan yang dirancang untuk menipu pengguna agar memberikan
                                informasi sensitif seperti kata sandi, data kartu kredit, atau informasi pribadi
                                lainnya.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                                Mengapa penting memeriksa URL?
                            </button>
                        </h2>
                        <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2">
                            <div class="accordion-body">
                                Memeriksa URL dapat mencegah Anda mengakses situs berbahaya dan melindungi data
                                pribadi dari pencurian identitas atau serangan siber lainnya.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="q3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                                Siapa yang paling berisiko terhadap URL phishing?
                            </button>
                        </h2>
                        <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3">
                            <div class="accordion-body">
                                Semua orang bisa menjadi target, terutama pengguna email bisnis, bank online, dan
                                layanan cloud yang sering berinteraksi dengan link.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT: Carousel Style -->
        <div class="col-md-6" style="height: 250px;">
            <h4 class="mb-3">Apa kata mereka?</h4>
            <div id="quoteCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="quote-box">
                            <h6><img src="https://www.microsoft.com/favicon.ico" alt="Microsoft" width="16">
                                Microsoft</h6>
                            <p class="mb-0">DMARC ensures the destination email systems trust messages sent from
                                your domain.
                                Using DMARC with SPF and DKIM gives organizations more protection against spoofing
                                and phishing
                                email. DMARC helps receiving mail systems decide what to do with messages from your
                                domain that
                                fail SPF or DKIM checks.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="quote-box">
                            <h6><img src="https://www.google.com/favicon.ico" alt="Google" width="16"> Google</h6>
                            <p class="mb-0">Without DMARC, hackers and other malicious users can impersonate
                                messages, making
                                them appear to come from your organization or domain. Turning off DMARC puts your
                                users and your
                                contacts at risk for spam, spoofing, and phishing.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#quoteCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#quoteCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Selanjutnya</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-center">

    <h2 class="fw-bold mb-3">
        Sudah sebanyak <span id="countUp" class="text-primary">0</span> URL diperiksa dalam website ini
    </h2>
    <p class="text-muted mb-4">Meliputi berbagai ekstensi domain yang sering digunakan</p>

    <!-- Statistik ekstensi domain -->
    <div class="row justify-content-center gy-3">
        <!-- .com -->
        <div class="col-6 col-sm-4 col-md-2">
            <div class="border rounded shadow-sm py-3 px-2 bg-light">
                <div class="fs-3 text-primary mb-1">
                    <i class="bi bi-globe2"></i>
                </div>
                <h6 class="mb-0">.com</h6>
                <small class="text-muted">820 URL</small>
            </div>
        </div>
        <!-- .xyz -->
        <div class="col-6 col-sm-4 col-md-2">
            <div class="border rounded shadow-sm py-3 px-2 bg-light">
                <div class="fs-3 text-warning mb-1">
                    <i class="bi bi-globe2"></i>
                </div>
                <h6 class="mb-0">.xyz</h6>
                <small class="text-muted">180 URL</small>
            </div>
        </div>
        <!-- .my.id -->
        <div class="col-6 col-sm-4 col-md-2">
            <div class="border rounded shadow-sm py-3 px-2 bg-light">
                <div class="fs-3 text-success mb-1">
                    <i class="bi bi-globe2"></i>
                </div>
                <h6 class="mb-0">.my.id</h6>
                <small class="text-muted">90 URL</small>
            </div>
        </div>
        <!-- .net -->
        <div class="col-6 col-sm-4 col-md-2">
            <div class="border rounded shadow-sm py-3 px-2 bg-light">
                <div class="fs-3 text-danger mb-1">
                    <i class="bi bi-globe2"></i>
                </div>
                <h6 class="mb-0">.net</h6>
                <small class="text-muted">70 URL</small>
            </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        <!-- Grafik Ringkasan -->
        <div class="col-md-4 text-center shadow-sm rounded p-3 bg-white">
            <!-- Angka total -->
            <input type="hidden" id="totalAman" value="840">
            <input type="hidden" id="totalPhishing" value="320">

            <h4 class="fw-bold mb-4">Riwayat URL</h4>
            <div class="position-relative mx-auto" style="width: 220px; height: 220px;">
                <canvas id="overallChart" width="220" height="220"></canvas>
                <div id="chartCenterText"
                    class="position-absolute top-50 start-50 translate-middle fw-semibold fs-5 text-dark">
                    120 URL
                </div>
            </div>
        </div>



        <div class="col-md-8" style="padding: 20px; ">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Riwayat URL Hari Ini</h4>
                <input type="text" class="form-control" id="searchUrl" placeholder="Cari URL..."
                    style="max-width: 250px;">
            </div>

            <div class="border rounded shadow-sm p-3"
                style="max-height: 400px; overflow-y: auto; background-color: #f8f9fa;">
                <ul class="list-group list-group-flush" id="urlList">

                    @foreach ($dataurl as $url)
                    @php
                    // Tentukan status dan warna berdasarkan confidence
                    if ($url->prediction == 'legitimate' || $url->confidence >= 70) {
                    $status = 'Terverifikasi Aman';
                    $badgeColor = '#0d6efd'; // biru
                    $textColor = 'text-white';
                    $label = 'Aman';
                    $subLabel = 'Verified';
                    } else {
                    $status = 'Terdeteksi Phishing';
                    $badgeColor = '#ffc107'; // kuning
                    $textColor = 'text-dark';
                    $label = 'Phishing';
                    $subLabel = 'Detected';
                    }
                    @endphp

                    <li class="list-group-item list-group-item-action p-0 border-0 mb-2 rounded bg-white shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#urlModal" data-url="{{ $url->url }}"
                        data-confidence="{{ $url->confidence }}" data-status="{{ $status }}"
                        data-analysis="{{ e($url->llm_analysis) }}" style="transition: all 0.3s ease;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 ps-3 py-2">
                                <span class="fw-semibold text-dark small">{{ $url->url }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center {{ $textColor }} rounded-end"
                                style="background-color: {{ $badgeColor }}; width: 30%; min-width: 100px; font-size: 13px;">
                                <div class="text-center">
                                    <div class="fw-bold">{{ $label }}</div>
                                    <small>{{ $subLabel }}</small>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>


    </div>
</div>

<!-- Modal Popup -->
<div class="modal fade" id="urlModal" tabindex="-1" aria-labelledby="urlModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- modal-lg biar lebih lebar -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="urlModalLabel">Detail Pemeriksaan URL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">


                <!-- Confidence Chart -->
                <div style="position: relative; width: 220px; height: 220px; margin: auto;">
                    <canvas id="confidenceChart" width="100" height="100"></canvas>
                </div>
                <!-- URL -->
                <p id="urlText" class="fw-bold text-primary mb-2"></p>
                <!-- Status -->
                <div class="mt-3">
                    <p id="urlStatus" class="text-muted fw-semibold"></p>
                </div>

                <!-- LLM Analysis -->
                <hr>
                <div class="mt-2">
                    <h6 class="fw-bold">Analisis Lengkap</h6>
                    <div id="urlAnalysis" class="small text-muted" style="max-height: 250px; overflow-y: auto;">
                        <!-- Analisis panjang akan dimasukkan dengan JS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="resultModalLabel">Hasil Analisis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modalResultContent">
                <!-- Konten akan diisi oleh JavaScript -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Pemberitahuan Berhasil -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" id="successMessage">
                <!-- Pesan akan diisi oleh script -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Peringatan / Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Peringatan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
                <!-- Pesan akan diisi oleh script -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Quota Habis -->
<div class="modal fade" id="quotaModal" tabindex="-1" aria-labelledby="quotaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="quotaModalLabel">Quota Habis</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ❌ Quota Check URL Anda sudah habis.<br>
                Silakan upgrade ke <strong>User Pro</strong> untuk mendapatkan quota lebih banyak.
            </div>
            <div class="modal-footer">
                <a href="/product" class="btn btn-primary">Upgrade Sekarang</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="/java.js"></script>

<script>
    function handleResponse(response) {
        if (response.status === "success") {
            document.getElementById('successMessage').innerText = response.message;
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        } else if (response.status === "error") {
            document.getElementById('errorMessage').innerText = response.message;
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        }
    };
</script>

@endpush
@section('footer-panel')

@endsection