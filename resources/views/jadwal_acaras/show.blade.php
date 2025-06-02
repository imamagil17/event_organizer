<x-default-layout title="Detail Jadwal Acara" section_title="Detail Jadwal Acara">
    <div class="container mt-5 pb-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $jadwalAcara->judul_kegiatan }}</h5>
                    <p class="text-muted">
                        <small>Waktu: {{ $jadwalAcara->waktu_mulai->format('H:i') }} -
                            {{ $jadwalAcara->waktu_selesai->format('H:i') }}</small>
                    </p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Deskripsi</h6>
                    <p class="card-text">{{ $jadwalAcara->deskripsi ?: '-' }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Acara</h6>
                    <p class="card-text">{{ $jadwalAcara->acara->judul ?? '-' }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    @can('edit-jadwal_acara')
                        <a href="{{ route('jadwal_acaras.edit', $jadwalAcara->id) }}" class="btn btn-warning px-4 py-2">Edit
                            Jadwal</a>
                    @endcan
                    <a href="{{ route('jadwal_acaras.index') }}" class="btn btn-outline-primary px-4 py-2">Lihat Semua
                        Jadwal</a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
