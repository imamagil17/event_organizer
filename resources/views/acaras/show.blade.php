<x-default-layout title="Detail Acara" section_title="Detail Acara">
    <div class="container mt-5 pb-5"> <!-- Padding bawah ditambahkan disini untuk memberi jarak di bawah container -->
        <!-- Card untuk Detail Acara -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <!-- Header Card -->
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $acara->judul }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui : {{ $acara->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Tanggal Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Tanggal</h6>
                    <p class="card-text">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</p>
                </div>

                <!-- Lokasi Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Lokasi</h6>
                    <p class="card-text">{{ $acara->lokasi }}</p>
                </div>

                <!-- Klien Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Klien</h6>
                    <p class="card-text">{{ $acara->klien->nama }}</p>
                </div>

                <!-- Kategori Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Kategori Acara</h6>
                    <p class="card-text">{{ $acara->kategoriAcara->nama }}</p>
                </div>

                <!-- Deskripsi Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Deskripsi</h6>
                    <p class="card-text">{{ $acara->deskripsi }}</p>
                </div>

                <!-- Optional Additional Information -->
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
