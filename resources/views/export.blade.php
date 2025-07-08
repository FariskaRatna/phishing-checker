@extends('master')

@section('main-panel')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h1 class="display-5 fw-bold">Dashboard Uji Coba</h1>
        </div>
        <div class="mt-3 mt-md-0">
            <a href="{{ route('phishing.export') }}" class="btn btn-success me-2">
                <i class="bi bi-file-earmark-excel"></i> Download Laporan
            </a>
            <a href="{{ url('/') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <p class="lead mb-4">Halaman ini menampilkan riwayat semua pengecekan URL/Email yang telah dilakukan melalui sistem.</p>

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Pengecekan</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
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
                                <td class="ps-4 text-break">{{ $phishing->url }}</td>
                                <td>
                                    @if(str_contains($phishing->final_prediction, 'phishing'))
                                        <span class="badge bg-danger text-capitalize">{{ str_replace('_', ' ', $phishing->final_prediction) }}</span>
                                    @else
                                        <span class="badge bg-success text-capitalize">{{ str_replace('_', ' ', $phishing->final_prediction) }}</span>
                                    @endif
                                </td>
                                <td>{{ number_format($phishing->final_confidence * 100, 2) }}%</td>
                                <td>
                                    {!! $phishing->trusted_domain ? '<span class="badge bg-info">Ya</span>' : '<span class="badge bg-secondary">Tidak</span>' !!}
                                </td>
                                <td class="text-nowrap">{{ $phishing->created_at->format('d M Y, H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Belum ada riwayat pengecekan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($phishings->hasPages())
        <div class="card-footer">
            {{ $phishings->links() }}
        </div>
        @endif
    </div>
</div>
@endsection