<x-default-layout title="Tambah Acara" section_title="Tambah Acara">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('acaras.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul"
                            value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                            value="{{ old('tanggal') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi"
                            value="{{ old('lokasi') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="klien_id" class="form-label">Klien</label>
                        <select name="klien_id" id="klien_id" class="form-control" required>
                            <option value="">Pilih Klien</option>
                            @foreach ($kliens as $klien)
                                <option value="{{ $klien->id }}"
                                    {{ old('klien_id') == $klien->id ? 'selected' : '' }}>{{ $klien->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_acara_id" class="form-label">Kategori Acara</label>
                        <select name="kategori_acara_id" id="kategori_acara_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriAcaras as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_acara_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                        <a href="{{ route('acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
