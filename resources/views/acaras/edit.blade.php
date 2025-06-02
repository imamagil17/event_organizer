<x-default-layout title="Edit Acara" section_title="Edit Acara">
    <div class="container mt-5 pb-5">
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
                            id="lokasi" value="{{ old('lokasi', $acara->lokasi) }}"
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
                                <option value="{{ $klien->id }}"
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

                    <div class="mb-4">
                        <label class="form-label font-weight-semibold">Pilih Vendor:</label>
                        <div class="row">
                            @foreach ($vendors as $vendor)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check border rounded px-3 py-2 shadow-sm">
                                        <input class="form-check-input" type="checkbox" name="vendors[]"
                                            value="{{ $vendor->id }}" id="vendor_{{ $vendor->id }}"
                                            {{ $acara->vendors->contains($vendor->id) ? 'checked' : '' }}>
                                        <label class="form-check-label d-block" for="vendor_{{ $vendor->id }}">
                                            <strong>{{ $vendor->nama }}</strong><br>
                                            <small class="text-muted">{{ $vendor->jenis_layanan }}</small><br>
                                            <span
                                                class="badge bg-success">Rp{{ number_format($vendor->biaya, 0, ',', '.') }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label font-weight-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                            placeholder="Masukkan deskripsi acara">{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="jumlah_tamu" class="form-label font-weight-semibold">Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu"
                            class="form-control @error('jumlah_tamu') is-invalid @enderror" id="jumlah_tamu"
                            value="{{ old('jumlah_tamu', $acara->jumlah_tamu) }}" min="0"
                            placeholder="Masukkan jumlah tamu">
                        @error('jumlah_tamu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="catatan_laporan" class="form-label font-weight-semibold">Catatan Laporan</label>
                        <textarea name="catatan_laporan" class="form-control @error('catatan_laporan') is-invalid @enderror"
                            id="catatan_laporan" rows="3" placeholder="Masukkan catatan laporan">{{ old('catatan_laporan', $acara->catatan_laporan) }}</textarea>
                        @error('catatan_laporan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="rating" class="form-label font-weight-semibold">Rating (1-5)</label>
                        <input type="number" name="rating"
                            class="form-control @error('rating') is-invalid @enderror" id="rating"
                            value="{{ old('rating', $acara->rating) }}" min="1" max="5"
                            placeholder="Masukkan rating">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="feedback" class="form-label font-weight-semibold">Feedback</label>
                        <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror" id="feedback" rows="3"
                            placeholder="Masukkan feedback">{{ old('feedback', $acara->feedback) }}</textarea>
                        @error('feedback')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                        <a href="{{ route('acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
                @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const vendorSelect = document.getElementById('vendors');
                            const totalBiayaInput = document.getElementById('total_biaya');

                            function updateTotalBiaya() {
                                let total = 0;
                                const selectedOptions = vendorSelect.selectedOptions;

                                for (let option of selectedOptions) {
                                    const biaya = parseFloat(option.getAttribute('data-biaya')) || 0;
                                    total += biaya;
                                }

                                totalBiayaInput.value = total.toFixed(2);
                            }

                            // Trigger saat user memilih vendor
                            vendorSelect.addEventListener('change', updateTotalBiaya);

                            // Trigger saat pertama kali halaman dimuat (untuk edit)
                            updateTotalBiaya();
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
</x-default-layout>
