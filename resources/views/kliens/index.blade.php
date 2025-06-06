<x-default-layout title="Klien" section_title="Klien">
    @can('store-klien')
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('kliens.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Klien
            </a>
        </div>
    @endcan

    <div class="row g-4">
        @forelse ($kliens as $klien)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 hover-shadow transition-all">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-light text-primary fw-bold d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px; font-size: 1.2rem;">
                                {{ strtoupper(substr($klien->nama, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-0">{{ $klien->nama }}</h5>
                                <small class="text-muted">{{ ucfirst($klien->jenis_klien) }}</small>
                            </div>
                            <div class="ms-auto d-flex gap-2">
                                <a href="{{ route('kliens.show', $klien) }}" class="text-info" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                @can('edit-klien')
                                    <a href="{{ route('kliens.edit', $klien) }}" class="text-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                @endcan
                                @can('destroy-klien')
                                    <form action="{{ route('kliens.destroy', $klien) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin mau hapus?')"
                                            class="btn btn-link p-0 m-0 text-danger" title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>

                        <div class="text-muted small">
                            <div><i class="bi bi-envelope me-1"></i> {{ $klien->email }}</div>
                            <div><i class="bi bi-telephone me-1"></i> {{ $klien->telepon ?? '-' }}</div>
                            <div><i class="bi bi-geo-alt me-1"></i>
                                {{ Str::limit($klien->alamat, 60) ?? 'Tidak ada alamat.' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-5">Belum ada klien. Yuk, tambah dulu!</p>
            </div>
        @endforelse
    </div>

    <style>
        .hover-shadow:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</x-default-layout>
