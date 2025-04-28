<x-default-layout title="Tambah Klien" section_title="Tambah Klien">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Tambah Klien</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kliens.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="nama" class="form-label font-weight-semibold">Nama Klien</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama klien" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="form-label font-weight-semibold">Email Klien</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email') }}" placeholder="Masukkan email klien" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="telepon" class="form-label font-weight-semibold">Telepon Klien</label>
                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                            id="telepon" value="{{ old('telepon') }}" placeholder="Masukkan nomor telepon klien">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="alamat" class="form-label font-weight-semibold">Alamat Klien</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="4"
                            placeholder="Masukkan alamat klien">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                        <a href="{{ route('kliens.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
