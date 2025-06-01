<x-default-layout title="Detail Klien" section_title="Detail Klien">
    <div class="container mt-5 pb-5"> <!-- Padding bawah untuk memberi jarak di bawah container -->
        <!-- Card untuk Detail Klien -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <!-- Header Card -->
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $klien->nama }}</h5>
                    <p class="text-muted">
                        <small>Terakhir diperbarui : {{ $klien->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Email Klien -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Email</h6>
                    <p class="card-text">{{ $klien->email }}</p>
                </div>

                <!-- Telepon Klien -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Telepon</h6>
                    <p class="card-text">{{ $klien->telepon }}</p>
                </div>

                <!-- Alamat Klien -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Alamat</h6>
                    <p class="card-text">{{ $klien->alamat }}</p>
                </div>

                <!-- Aksi Navigasi -->
                <div class="d-flex justify-content-between">
                    @can('edit-klien')
                        <a href="{{ route('kliens.edit', $klien->id) }}" class="btn btn-warning px-4 py-2">
                            Edit Klien
                        </a>
                    @endcan
                    <a href="{{ route('kliens.index') }}" class="btn btn-outline-primary px-4 py-2">
                        Lihat Semua Klien
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
