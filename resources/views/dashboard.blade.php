<x-default-layout title="Dashboard | Event Organizer" section_title="Dashboard">
    <div class="container mt-5">
        <div class="row g-4 mb-4">
            <!-- Total Klien -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <i class="bi bi-people-fill text-primary fs-2"></i>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Total Klien</h6>
                                <h4 class="fw-bold">{{ $jumlahKlien }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Acara -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <i class="bi bi-calendar-event-fill text-success fs-2"></i>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Total Acara</h6>
                                <h4 class="fw-bold">{{ $jumlahAcara }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori Acara -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <i class="bi bi-tags-fill text-warning fs-2"></i>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Kategori Acara</h6>
                                <h4 class="fw-bold">{{ $jumlahKategori }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Vendor -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <i class="bi bi-person-badge-fill text-info fs-2"></i>
                            <div class="text-end">
                                <h6 class="fw-bold text-muted">Total Vendor</h6>
                                <h4 class="fw-bold">{{ $jumlahVendor }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Acara per Kategori dan Rata-Rata Rating -->
        <div class="row g-4 mb-4">
            <!-- Swiper: Acara per Kategori -->
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body">
                        <h6 class="fw-bold text-muted mb-3">List Acara per Kategori</h6>

                        <div class="swiper acaraSwiper">
                            <div class="swiper-wrapper">
                                @forelse ($acaraPerKategori as $kategori)
                                    <div class="swiper-slide">
                                        <div class="card border-0 shadow-sm mx-2" style="min-width: 200px;">
                                            <div class="card-body text-center">
                                                <i class="bi bi-tags-fill text-warning fs-3 mb-2"></i>
                                                <h6 class="fw-bold mb-1">{{ $kategori->nama }}</h6>
                                                <p class="mb-0 text-muted small">Total Acara</p>
                                                <h5 class="fw-bold text-primary">{{ $kategori->acaras_count }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <p class="text-muted">Belum ada data kategori.</p>
                                    </div>
                                @endforelse
                            </div>
                            <!-- Navigasi -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rata-rata Rating -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-lg h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <h6 class="fw-bold text-muted mb-2">Rata-rata Rating Acara</h6>
                        <i class="bi bi-star-fill text-warning fs-2 mb-2"></i>
                        <h3 class="fw-bold text-warning mb-0">{{ number_format($rataRating, 1) }} / 5</h3>
                        <p class="text-muted mb-0">Berdasarkan semua acara</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SwiperJS Init -->
        @push('scripts')
            <script>
                const acaraSwiper = new Swiper('.acaraSwiper', {
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false
                    },
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    grabCursor: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1.3
                        },
                        576: {
                            slidesPerView: 2
                        },
                        768: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 4
                        },
                    }
                });
            </script>
        @endpush

        <!-- Daftar Klien Terbaru & Vendor Terbaru -->
        <div class="row g-4 mb-4">
            <!-- Klien Terbaru -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white fw-bold">Klien Terbaru</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach ($klienTerbaru as $klien)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $klien->nama }}</span>
                                    <small class="text-muted">{{ $klien->created_at->format('d M Y') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Vendor Terbaru -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-white fw-bold">Vendor Terbaru</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach ($vendorTerbaru as $vendor)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ $vendor->nama }}</span>
                                    <small class="text-muted">{{ $vendor->created_at->format('d M Y') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acara Terbaru -->
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white fw-bold">Acara Terbaru</div>
            <div class="card-body">
                @if ($acaras->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Klien</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acaras as $acara)
                                    <tr>
                                        <td>{{ $acara->judul }}</td>
                                        <td>{{ \Carbon\Carbon::parse($acara->tanggal)->format('d M Y') }}</td>
                                        <td>{{ $acara->klien->nama }}</td>
                                        <td>{{ $acara->lokasi }}</td>
                                        <td>
                                            @php
                                                $status = $acara->status_waktu;
                                                $badge = match ($status) {
                                                    'Hari Ini' => 'success',
                                                    'Besok' => 'warning text-dark',
                                                    default => 'info',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badge }}">{{ $status }}</span>
                                        </td>
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

    <!-- Optional Scrollbar Styling -->
    <style>
        .overflow-auto::-webkit-scrollbar {
            height: 6px;
        }

        .overflow-auto::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
    </style>
</x-default-layout>
