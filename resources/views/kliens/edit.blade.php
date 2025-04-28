<x-default-layout title="Edit Klien" section_title="Edit Klien">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-warning text-white">
                <h4 class="m-0">Edit Klien</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kliens.update', $klien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="nama" class="form-label font-weight-semibold">Nama Klien</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" value="{{ old('nama', $klien->nama) }}" placeholder="Masukkan nama klien"
                            required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="form-label font-weight-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email', $klien->email) }}" placeholder="Masukkan email klien"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="telepon" class="form-label font-weight-semibold">Telepon</label>
                        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                            id="telepon" value="{{ old('telepon', $klien->telepon) }}"
                            placeholder="Masukkan telepon klien">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="alamat" class="form-label font-weight-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="4"
                            placeholder="Masukkan alamat klien">{{ old('alamat', $klien->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning px-4 py-2">Update</button>
                        <a href="{{ route('kliens.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
