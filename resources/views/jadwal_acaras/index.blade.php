<x-default-layout title="Jadwal Acara" section_title="Jadwal Acara">
    @can('store-jadwal_acara')
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('jadwal_acaras.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Jadwal
            </a>
        </div>
    @endcan

    <div class="row g-4">
        @forelse ($jadwalAcaras as $jadwal)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 hover-shadow transition-all">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-light text-primary fw-bold d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px; font-size: 1.2rem;">
                                {{ strtoupper(substr($jadwal->judul_kegiatan, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-0">{{ $jadwal->judul_kegiatan }}</h5>
                                <small class="text-muted">
                                    {{ $jadwal->waktu_mulai ? \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') : '-' }}
                                    -
                                    {{ $jadwal->waktu_selesai ? \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') : '-' }}
                                </small>
                            </div>
                            <div class="ms-auto d-flex gap-2">
                                <a href="{{ route('jadwal_acaras.show', $jadwal->id) }}" class="text-info"
                                    title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                @can('edit-jadwal_acara')
                                    <a href="{{ route('jadwal_acaras.edit', $jadwal->id) }}" class="text-warning"
                                        title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                @endcan
                                @can('destroy-jadwal_acara')
                                    <form action="{{ route('jadwal_acaras.destroy', $jadwal->id) }}" method="POST"
                                        class="d-inline">
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

                        <div class="text-muted small mb-2">
                            {{ $jadwal->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </div>

                        <div class="text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $jadwal->acara->judul ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-5">Belum ada jadwal acara. Yuk, tambah dulu!</p>
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
