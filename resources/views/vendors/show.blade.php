<x-default-layout title="Detail Vendor" section_title="Detail Vendor">
    <div class="container mt-5 pb-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $vendor->nama }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui : {{ $vendor->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Jenis Layanan</h6>
                    <p class="card-text">{{ $vendor->jenis_layanan }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Kontak</h6>
                    <p class="card-text">{{ $vendor->kontak ?: '-' }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Biaya</h6>
                    <p class="card-text">Rp {{ number_format($vendor->biaya, 0, ',', '.') }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    @can('edit-vendor')
                        <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning px-4 py-2">Edit Vendor</a>
                    @endcan
                    <a href="{{ route('vendors.index') }}" class="btn btn-outline-primary px-4 py-2">Lihat Semua
                        Vendor</a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
