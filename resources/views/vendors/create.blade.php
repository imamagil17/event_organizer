<x-default-layout title="Tambah Vendor" section_title="Tambah Vendor">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Vendor</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('vendors.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="nama" class="form-label font-weight-semibold">Nama Vendor</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                            placeholder="Masukkan nama vendor" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="jenis_layanan" class="form-label font-weight-semibold">Jenis Layanan</label>
                        <input type="text" name="jenis_layanan" id="jenis_layanan"
                            class="form-control @error('jenis_layanan') is-invalid @enderror"
                            value="{{ old('jenis_layanan') }}" placeholder="Masukkan jenis layanan vendor" required>
                        @error('jenis_layanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="kontak" class="form-label font-weight-semibold">Kontak</label>
                        <input type="text" name="kontak" id="kontak"
                            class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}"
                            placeholder="Masukkan kontak vendor">
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="biaya" class="form-label font-weight-semibold">Biaya</label>
                        <input type="number" step="0.01" name="biaya" id="biaya"
                            class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') }}"
                            placeholder="Masukkan biaya vendor" required>
                        @error('biaya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                        <a href="{{ route('vendors.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
