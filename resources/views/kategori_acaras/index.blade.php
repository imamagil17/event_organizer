<x-default-layout title="Kategori Acara" section_title="Kategori Acara">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('kategori_acaras.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Kategori
        </a>
    </div>

    <div class="row g-3">
        @forelse ($kategoriAcaras as $kategori)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100 hover-shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <span
                                    class="badge bg-{{ ['primary', 'success', 'warning', 'info', 'danger'][array_rand(['primary', 'success', 'warning', 'info', 'danger'])] }} me-2">
                                    {{ strtoupper(substr($kategori->nama, 0, 1)) }}
                                </span>
                                <h5 class="card-title mb-0">{{ $kategori->nama }}</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('kategori_acaras.show', $kategori) }}" class="text-info me-2"
                                    title="Detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('kategori_acaras.edit', $kategori) }}" class="text-warning me-2"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('kategori_acaras.destroy', $kategori) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin mau hapus?')"
                                        class="btn btn-link p-0 m-0 text-danger" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class="card-text mt-2 text-muted">
                            {{ Str::limit($kategori->deskripsi, 60) ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada kategori acara. Yuk, tambah dulu!</p>
            </div>
        @endforelse
    </div>
</x-default-layout>
