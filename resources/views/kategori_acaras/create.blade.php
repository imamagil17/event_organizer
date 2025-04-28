<x-default-layout title="Tambah Kategori Acara" section_title="Tambah Kategori Acara">
    <div class="container mt-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Kategori Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori_acaras.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="nama" class="form-label font-weight-semibold">Nama Kategori Acara</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama kategori acara"
                            required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label font-weight-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi kategori acara">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                        <a href="{{ route('kategori_acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
