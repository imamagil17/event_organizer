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
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}"
                            required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}"
                            required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}"
                            required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="klien_id" class="form-label">Klien</label>
                        <select name="klien_id" id="klien_id"
                            class="form-control @error('klien_id') is-invalid @enderror" required>
                            <option value="">Pilih Klien</option>
                            @foreach ($kliens as $klien)
                                <option value="{{ $klien->id }}"
                                    {{ old('klien_id') == $klien->id ? 'selected' : '' }}>
                                    {{ $klien->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('klien_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori_acara_id" class="form-label">Kategori Acara</label>
                        <select name="kategori_acara_id" id="kategori_acara_id"
                            class="form-control @error('kategori_acara_id') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriAcaras as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_acara_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_acara_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_tamu" class="form-label">Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" id="jumlah_tamu" min="0"
                            class="form-control @error('jumlah_tamu') is-invalid @enderror"
                            value="{{ old('jumlah_tamu') }}" placeholder="Masukkan jumlah tamu">
                        @error('jumlah_tamu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total_biaya" class="form-label">Total Biaya</label>
                        <input type="number" name="total_biaya" id="total_biaya" min="0" step="0.01"
                            class="form-control @error('total_biaya') is-invalid @enderror"
                            value="{{ old('total_biaya') }}" placeholder="Masukkan total biaya">
                        @error('total_biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="catatan_laporan" class="form-label">Catatan Laporan</label>
                        <textarea name="catatan_laporan" id="catatan_laporan" rows="3"
                            class="form-control @error('catatan_laporan') is-invalid @enderror" placeholder="Masukkan catatan laporan">{{ old('catatan_laporan') }}</textarea>
                        @error('catatan_laporan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (1-5)</label>
                        <input type="number" name="rating" id="rating" min="1" max="5"
                            class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}"
                            placeholder="Masukkan rating">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="feedback" class="form-label">Feedback</label>
                        <textarea name="feedback" id="feedback" rows="3"
                            class="form-control @error('feedback') is-invalid @enderror" placeholder="Masukkan feedback">{{ old('feedback') }}</textarea>
                        @error('feedback')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
