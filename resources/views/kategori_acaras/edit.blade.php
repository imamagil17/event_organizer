<x-default-layout title="Edit Kategori Acara" section_title="Edit Kategori Acara">
    <div class="container mt-5">
        <!-- Card for Edit Kategori Acara -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Edit Kategori Acara</h4>
            </div>
            <div class="card-body">
                <!-- Form to Edit Kategori Acara -->
                <form action="{{ route('kategori_acaras.update', $kategoriAcara->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input for Nama Kategori Acara -->
                    <div class="form-group mb-4">
                        <label for="nama" class="form-label font-weight-semibold">Nama Kategori Acara</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" value="{{ old('nama', $kategoriAcara->nama) }}"
                            placeholder="Masukkan nama kategori acara" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Textarea for Deskripsi -->
                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label font-weight-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi kategori acara">{{ old('deskripsi', $kategoriAcara->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                        <a href="{{ route('kategori_acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
