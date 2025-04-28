<x-default-layout title="Detail Klien" section_title="Detail Klien">
    <div class="container mt-5">
        <!-- Card untuk Detail Klien -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <!-- Header Card -->
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $klien->nama }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui: {{ $klien->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Informasi Kontak Klien -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Kontak</h6>
                    <p class="card-text"><strong>Email:</strong> {{ $klien->email }}</p>
                    <p class="card-text"><strong>Telepon:</strong> {{ $klien->telepon }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $klien->alamat }}</p>
                </div>

                <!-- Optional Additional Information -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('kliens.edit', $klien->id) }}" class="btn btn-warning px-4 py-2">
                        Edit Klien
                    </a>
                    <a href="{{ route('kliens.index') }}" class="btn btn-outline-primary px-4 py-2">
                        Lihat Semua Klien
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
