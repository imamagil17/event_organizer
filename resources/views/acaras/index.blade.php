<x-default-layout title="Acara" section_title="Acara">
    @can('store-acara')
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('acaras.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Acara
            </a>
        </div>
    @endcan

    <div class="row g-3">
        @forelse ($acaras as $acara)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100 hover-shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <span
                                    class="badge bg-{{ ['primary', 'success', 'warning', 'info', 'danger'][array_rand(['primary', 'success', 'warning', 'info', 'danger'])] }} me-2">
                                    {{ strtoupper(substr($acara->judul, 0, 1)) }}
                                </span>
                                <h5 class="card-title mb-0">{{ $acara->judul }}</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('acaras.show', $acara->id) }}" class="text-info me-2" title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                @can('edit-acara')
                                    <a href="{{ route('acaras.edit', $acara->id) }}" class="text-warning me-2"
                                        title="Edit">
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
                        <p class="card-text mt-2 text-muted">
                            <strong>Tanggal :</strong> {{ $acara->tanggal }}<br>
                            <strong>Lokasi :</strong> {{ $acara->lokasi }}<br>
                            <strong>Klien :</strong> {{ $acara->klien->nama }}<br>
                            <strong>Kategori :</strong> {{ $acara->kategoriAcara->nama }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada acara. Yuk, tambah dulu!</p>
            </div>
        @endforelse
    </div>
</x-default-layout>
