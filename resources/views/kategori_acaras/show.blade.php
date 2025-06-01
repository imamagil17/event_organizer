<x-default-layout title="Detail Kategori Acara" section_title="Detail Kategori Acara">
    <div class="container mt-5">
        <!-- Card untuk Detail Kategori Acara -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <!-- Header Card -->
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $kategoriAcara->nama }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui : {{ $kategoriAcara->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Deskripsi Kategori Acara -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Deskripsi</h6>
                    <p class="card-text">{{ $kategoriAcara->deskripsi }}</p>
                </div>

                <!-- Optional Additional Information -->
                <div class="d-flex justify-content-between">
                    @can('edit-kategori_acara')
                        <a href="{{ route('kategori_acaras.edit', $kategoriAcara->id) }}" class="btn btn-warning px-4 py-2">
                            Edit Kategori
                        </a>
                    @endcan
                    <a href="{{ route('kategori_acaras.index') }}" class="btn btn-outline-primary px-4 py-2">
                        Lihat Semua Kategori
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
