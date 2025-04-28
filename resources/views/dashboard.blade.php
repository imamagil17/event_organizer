<x-default-layout title="Dashboard | Event Organizer" section_title="Dashboard">
    <div class="container mt-5">
        <div class="row g-4 mb-5">
            <!-- Total Klien -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-primary">
                                <i class="bi bi-people-fill" style="font-size: 2rem;"></i>
                            </div>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Total Klien</h6>
                                <h3 class="fw-bold">{{ $jumlahKlien }}</h3>
                            </div>
                        </div>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-primary" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Acara -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-success">
                                <i class="bi bi-calendar-event-fill" style="font-size: 2rem;"></i>
                            </div>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Total Acara</h6>
                                <h3 class="fw-bold">{{ $jumlahAcara }}</h3>
                            </div>
                        </div>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-success" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori Acara -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="text-warning">
                                <i class="bi bi-tags-fill" style="font-size: 2rem;"></i>
                            </div>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Kategori Acara</h6>
                                <h3 class="fw-bold">{{ $jumlahKategori }}</h3>
                            </div>
                        </div>
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar bg-warning" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Acara Terbaru -->
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white">
                <h5 class="fw-bold mb-0">Acara Terbaru</h5>
            </div>
            <div class="card-body">
                @if ($acaras->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul Acara</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Klien</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acaras as $acara)
                                    <tr>
                                        <td>{{ $acara->judul }}</td>
                                        <td>{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        <td>{{ $acara->klien->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center mb-0">Belum ada acara yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</x-default-layout>
