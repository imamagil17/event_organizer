<x-default-layout title="Edit Acara" section_title="Edit Acara">
    <div class="container mt-5 pb-5"> <!-- Padding bawah ditambahkan disini untuk memberi jarak di bawah container -->
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Edit Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('acaras.update', $acara->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="judul" class="form-label font-weight-semibold">Judul Acara</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" value="{{ old('judul', $acara->judul) }}" placeholder="Masukkan judul acara"
                            required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="tanggal" class="form-label font-weight-semibold">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                            id="tanggal" value="{{ old('tanggal', $acara->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="lokasi" class="form-label font-weight-semibold">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                            id="lokasi" value="{{ old('lokasi', $acara->lokasi) }} "
                            placeholder="Masukkan lokasi acara" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="klien_id" class="form-label font-weight-semibold">Klien</label>
                        <select name="klien_id" id="klien_id"
                            class="form-control @error('klien_id') is-invalid @enderror" required>
                            <option value="">Pilih Klien</option>
                            @foreach ($kliens as $klien)
                                <option value="{{ $klien->id }} "
                                    {{ old('klien_id', $acara->klien_id) == $klien->id ? 'selected' : '' }}>
                                    {{ $klien->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('klien_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="kategori_acara_id" class="form-label font-weight-semibold">Kategori Acara</label>
                        <select name="kategori_acara_id" id="kategori_acara_id"
                            class="form-control @error('kategori_acara_id') is-invalid @enderror" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriAcaras as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_acara_id', $acara->kategori_acara_id) == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_acara_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label font-weight-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi acara">{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                        <a href="{{ route('acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
