<x-default-layout title="Acara" section_title="Acara">
    @can('store-acara')
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('acaras.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Acara
            </a>
        </div>
    @endcan

    <div class="row g-4">
        @forelse ($acaras as $acara)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 hover-shadow transition-all">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-3">
                            <div class="rounded-circle bg-light text-success fw-bold d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px; font-size: 1.2rem;">
                                {{ strtoupper(substr($acara->judul, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-0">{{ $acara->judul }}</h5>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($acara->tanggal)->translatedFormat('d F Y') }}
                                </small>
                            </div>
                            <div class="ms-auto d-flex gap-2">
                                <a href="{{ route('acaras.show', $acara->id) }}" class="text-info" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                @can('edit-acara')
                                    <a href="{{ route('acaras.edit', $acara->id) }}" class="text-warning" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                @endcan
                                @can('destroy-acara')
                                    <form action="{{ route('acaras.destroy', $acara->id) }}" method="POST"
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

                        <div class="text-muted small">
                            <div><i class="bi bi-geo-alt-fill me-1"></i> {{ $acara->lokasi }}</div>
                            <div><i class="bi bi-person-fill me-1"></i> {{ optional($acara->klien)->nama ?? '-' }}</div>
                            <div><i class="bi bi-tags-fill me-1"></i> {{ optional($acara->kategoriAcara)->nama ?? '-' }}
                            </div>
                            <div><i class="bi bi-people-fill me-1"></i> {{ $acara->jumlah_tamu }}</div>
                            <div>Rp {{ number_format($acara->total_biaya, 0, ',', '.') }}</div>


                            <div class="mt-3 d-flex align-items-center flex-wrap gap-2">
                                <i class="bi bi-person-badge-fill me-1 text-primary" style="font-size: 1.2rem;"></i>
                                <div class="vendor-list d-flex flex-wrap gap-2 mb-0">
                                    @forelse ($acara->vendors as $vendor)
                                        <span class="vendor-badge">
                                            {{ $vendor->nama ?? ($vendor->nama_vendor ?? 'Vendor') }}
                                        </span>
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                            @if ($acara->catatan_laporan)
                                <div><i class="bi bi-journal-text me-1"></i>
                                    {{ Str::limit($acara->catatan_laporan, 50) }}</div>
                            @endif
                            @if ($acara->rating)
                                <div><i class="bi bi-star-fill me-1 text-warning"></i> {{ $acara->rating }} / 5</div>
                            @endif
                            @if ($acara->feedback)
                                <div><i class="bi bi-chat-dots me-1"></i> {{ Str::limit($acara->feedback, 50) }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted fs-5">Belum ada acara. Yuk, tambah dulu!</p>
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

        .vendor-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .vendor-badge {
            background-color: #e9f5f9;
            color: #0d6efd;
            font-size: 0.85rem;
            padding: 4px 10px;
            border-radius: 20px;
            box-shadow: 0 1px 3px rgba(13, 110, 253, 0.2);
            user-select: none;
            white-space: nowrap;
        }
    </style>
</x-default-layout>
