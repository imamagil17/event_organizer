<x-default-layout title="Detail Acara" section_title="Detail Acara">
    <div class="container mt-5 pb-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $acara->judul }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui : {{ $acara->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Tanggal</h6>
                    <p class="card-text">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Lokasi</h6>
                    <p class="card-text">{{ $acara->lokasi }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Klien</h6>
                    <p class="card-text">{{ $acara->klien->nama }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Kategori Acara</h6>
                    <p class="card-text">{{ $acara->kategoriAcara->nama }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Deskripsi</h6>
                    <p class="card-text">{{ $acara->deskripsi ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Jumlah Tamu</h6>
                    <p class="card-text">{{ $acara->jumlah_tamu ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Total Biaya</h6>
                    <p class="card-text">Rp {{ number_format($acara->total_biaya ?? 0, 2, ',', '.') }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Catatan Laporan</h6>
                    <p class="card-text">{{ $acara->catatan_laporan ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Rating</h6>
                    <p class="card-text">{{ $acara->rating ? $acara->rating . '/5' : '-' }}</p>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-bold text-secondary">Feedback</h6>
                    <p class="card-text">{{ $acara->feedback ?? '-' }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    @can('edit-acara')
                        <a href="{{ route('acaras.edit', $acara->id) }}" class="btn btn-warning px-4 py-2">
                            Edit Acara
                        </a>
                    @endcan
                    <a href="{{ route('acaras.index') }}" class="btn btn-outline-primary px-4 py-2">
                        Lihat Semua Acara
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
