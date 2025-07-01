<!-- Menghubungkan dengan view template master -->
@extends('master')
@section('head')

@endsection
@section('main-panel')

<!-- Section: Kasus Link Phishing -->
<section class="c text-center">
    <div class="container">
        <h2 class="fw-bold">Documentation</h2>
        <h4 class="mt-3 mb-4">Kasus Link Phising di Dunia</h4>
        <div class="row align-items-center">
            <div class="col-md-6 text-end">
                <img src="https://placehold.co/400x300.png" style="bottom:-120px; position: absolute; right: 50%;"
                    alt="Ilustrasi Phishing">
            </div>
            <div class="col-md-6 text-start">
                <p>
                    Di Indonesia, sepanjang tahun 2024, tercatat rata-rata 1.200 laporan penipuan online setiap
                    bulannya.
                    Sekitar 34% di antaranya terkait link palsu yang menyerupai situs perbankan atau e-commerce.
                    Secara global, APWG mencatat lebih dari 1,3 juta situs phishing aktif di tahun 2023,
                    di mana 83% penipuan berasal dari klik URL yang terlihat sah.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section: Penelitian Link Phishing -->
<section class="section-light " style="padding-top: 140px;">
    <div class="container">
        <h4 class="mb-4 text-center fw-bold">Penelitian Permasalahan Link Phishing</h4>
        <div class="row align-items-center">
            <div class="col-md-6 text-end">
                <p>
                    Sejumlah penelitian dari jurnal internasional menunjukkan bahwa deteksi URL phishing
                    berbasis machine learning sangat efektif. Studi dari IEEE dan Elsevier membuktikan bahwa
                    penggunaan pola URL, struktur domain, dan analisis redirect dapat meningkatkan akurasi
                    pendeteksian
                    hingga 96%. Teknologi ini telah diadopsi di berbagai negara sebagai standar mitigasi ancaman
                    digital.
                </p>
            </div>
            <div class="col-md-6">
                <img src="https://placehold.co/300x200.png" alt="Ilustrasi Penelitian">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 text-end">
                <img src="https://placehold.co/300x200.png" alt="Ilustrasi Penelitian">

            </div>
            <div class="col-md-6">
                <p>
                    Sejumlah penelitian dari jurnal internasional menunjukkan bahwa deteksi URL phishing
                    berbasis machine learning sangat efektif. Studi dari IEEE dan Elsevier membuktikan bahwa
                    penggunaan pola URL, struktur domain, dan analisis redirect dapat meningkatkan akurasi
                    pendeteksian
                    hingga 96%. Teknologi ini telah diadopsi di berbagai negara sebagai standar mitigasi ancaman
                    digital.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section: Our Solution -->
<section class="section-light text-center pt-5 pb-5">
    <div class="container">
        <h4 class="mb-4 fw-bold">Our Solution</h4>
        <img src="https://placehold.co/700x250.png" alt="Solusi Kami">
    </div>
</section>
@endsection

@push('scripts')
<script src="/java.js"></script>

<script>
    console.log('Ini dari halaman Home');
</script>
@endpush
@section('footer-panel')

@endsection