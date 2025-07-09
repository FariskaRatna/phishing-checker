@extends('master')

@section('main-panel')
<div class="d-flex flex-column min-vh-100">
    <div class="container my-5 pt-5 flex-grow-1">
        <div class="mb-5">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <h1 class="display-6 fw-bold mb-1">Dashboard Laporan</h1>
                    <p class="text-muted mb-0">Riwayat pengecekan URL/Email yang telah dilakukan melalui sistem.</p>
                </div>
                <div class="mt-3 mt-md-0 d-flex gap-2">
                    <a href="{{ route('phishing.export') }}" class="btn btn-success" data-bs-toggle="tooltip" title="Download laporan dalam format Excel">
                        <i class="bi bi-file-earmark-excel"></i> Download Laporan
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Kembali ke halaman utama">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Riwayat Pengecekan</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="ps-4">URL / Input</th>
                                <th scope="col">Prediksi Final</th>
                                <th scope="col">Skor Kepercayaan</th>
                                <th scope="col">Domain Terpercaya</th>
                                <th scope="col">Waktu Pengecekan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($phishings as $phishing)
                                <tr>
                                    <td class="ps-4 text-break" style="max-width: 300px;">{{ $phishing->url }}</td>
                                    <td>
                                        @if(str_contains($phishing->final_prediction, 'phishing'))
                                            <span class="badge bg-danger text-capitalize">
                                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                                {{ str_replace('_', ' ', $phishing->final_prediction) }}
                                            </span>
                                        @else
                                            <span class="badge bg-success text-capitalize">
                                                <i class="bi bi-shield-check me-1"></i>
                                                {{ str_replace('_', ' ', $phishing->final_prediction) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{ number_format($phishing->final_confidence * 100, 2) }}%</span>
                                    </td>
                                    <td>
                                        @if($phishing->trusted_domain)
                                            <span class="badge bg-info text-dark">
                                                <i class="bi bi-patch-check-fill me-1"></i> Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="bi bi-x-circle me-1"></i> Tidak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">{{ $phishing->created_at->format('d M Y, H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="bi bi-inbox display-4 text-muted mb-2"></i>
                                        <div class="text-muted">Belum ada riwayat pengecekan.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($phishings->hasPages())
            <div class="card-footer bg-white">
                {{ $phishings->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection