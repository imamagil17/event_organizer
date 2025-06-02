<x-default-layout title="Edit Jadwal Acara" section_title="Edit Jadwal Acara">
    <div class="container mt-5 pb-5">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-warning text-white">
                <h4 class="m-0">Edit Jadwal Acara</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal_acaras.update', $jadwalAcara->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="acara_id" class="form-label font-weight-semibold">Acara</label>
                        <select name="acara_id" id="acara_id"
                            class="form-select @error('acara_id') is-invalid @enderror" required>
                            <option value="" disabled>Pilih acara</option>
                            @foreach ($acaras as $acara)
                                <option value="{{ $acara->id }}"
                                    {{ old('acara_id', $jadwalAcara->acara_id) == $acara->id ? 'selected' : '' }}>
                                    {{ $acara->judul }}
                                </option>
                            @endforeach
                        </select>
                        @error('acara_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="waktu_mulai" class="form-label font-weight-semibold">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai"
                            class="form-control @error('waktu_mulai') is-invalid @enderror"
                            value="{{ old('waktu_mulai', $jadwalAcara->waktu_mulai->format('H:i')) }}" required>
                        @error('waktu_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="waktu_selesai" class="form-label font-weight-semibold">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai"
                            class="form-control @error('waktu_selesai') is-invalid @enderror"
                            value="{{ old('waktu_selesai', $jadwalAcara->waktu_selesai->format('H:i')) }}" required>
                        @error('waktu_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="judul_kegiatan" class="form-label font-weight-semibold">Judul Kegiatan</label>
                        <input type="text" name="judul_kegiatan" id="judul_kegiatan"
                            class="form-control @error('judul_kegiatan') is-invalid @enderror"
                            value="{{ old('judul_kegiatan', $jadwalAcara->judul_kegiatan) }}"
                            placeholder="Masukkan judul kegiatan" required>
                        @error('judul_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="deskripsi" class="form-label font-weight-semibold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi', $jadwalAcara->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning px-4 py-2">Update</button>
                        <a href="{{ route('jadwal_acaras.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
