<x-default-layout title="Tambah Acara" section_title="Tambah Acara">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('acaras.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="judul" class="form-label font-weight-semibold">Judul Acara</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}"
                            required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="tanggal" class="form-label font-weight-semibold">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}"
                            required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="lokasi" class="form-label font-weight-semibold">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}"
                            required>
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
                                    {{ old('klien_id') == $klien->id ? 'selected' : '' }}>
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
                                    {{ old('kategori_acara_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_acara_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Vendor checkbox seperti di edit --}}
                    <div class="mb-4">
                        <label class="form-label font-weight-semibold">Pilih Vendor:</label>
                        <div class="row">
                            @foreach ($vendors as $vendor)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check border rounded px-3 py-2 shadow-sm">
                                        <input class="form-check-input vendor-checkbox" type="checkbox" name="vendors[]"
                                            value="{{ $vendor->id }}" id="vendor_{{ $vendor->id }}"
                                            data-biaya="{{ $vendor->biaya }}"
                                            {{ is_array(old('vendors')) && in_array($vendor->id, old('vendors')) ? 'checked' : '' }}>
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
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="jumlah_tamu" class="form-label font-weight-semibold">Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" id="jumlah_tamu" min="0"
                            class="form-control @error('jumlah_tamu') is-invalid @enderror"
                            value="{{ old('jumlah_tamu') }}">
                        @error('jumlah_tamu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="total_biaya" class="form-label font-weight-semibold">Total Biaya</label>
                        <input type="number" name="total_biaya" id="total_biaya" min="0" step="0.01" readonly
                            class="form-control @error('total_biaya') is-invalid @enderror"
                            value="{{ old('total_biaya', 0) }}">
                        @error('total_biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="catatan_laporan" class="form-label font-weight-semibold">Catatan Laporan</label>
                        <textarea name="catatan_laporan" id="catatan_laporan" rows="3"
                            class="form-control @error('catatan_laporan') is-invalid @enderror">{{ old('catatan_laporan') }}</textarea>
                        @error('catatan_laporan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="rating" class="form-label font-weight-semibold">Rating (1-5)</label>
                        <input type="number" name="rating" id="rating" min="1" max="5"
                            class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="feedback" class="form-label font-weight-semibold">Feedback</label>
                        <textarea name="feedback" id="feedback" rows="3"
                            class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback') }}</textarea>
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

    {{-- Script Total Biaya berdasarkan checkbox --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const vendorCheckboxes = document.querySelectorAll('.vendor-checkbox');
            const totalBiayaInput = document.getElementById('total_biaya');

            function updateTotalBiaya() {
                let total = 0;
                vendorCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.dataset.biaya) || 0;
                    }
                });
                totalBiayaInput.value = total.toFixed(2);
            }

            vendorCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotalBiaya);
            });

            // Hitung total biaya saat load halaman, jika ada old input
            updateTotalBiaya();
        });
    </script>
</x-default-layout>
