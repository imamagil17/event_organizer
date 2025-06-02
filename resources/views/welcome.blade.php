<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ease | Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
        }

        .hero {
            background: linear-gradient(to right, #0d6efd, #6610f2);
            min-height: 100vh;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .icon-feature {
            font-size: 2rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .feature-box {
            padding: 2rem;
            border-radius: 16px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .z-1 {
            z-index: 1;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero position-relative text-white text-center d-flex align-items-center" style="height: 100vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('https://images.unsplash.com/photo-1531058020387-3be344556be6?auto=format&fit=crop&w=1950&q=80') no-repeat center center / cover;">
        </div>
        <div class="container position-relative z-1">
            <h1 class="display-3 fw-bold">Selamat Datang di <span class="text-warning">Event Ease</span></h1>
            <p class="lead mb-4">Platform Event Organizer modern untuk acara yang sukses dan terorganisir</p>
            <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg px-4 shadow">Mulai Sekarang</a>
        </div>
    </section>


    <!-- Tentang Kami -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Tentang Kami</h2>
            <p class="text-center">
                <strong>Event Ease</strong> adalah platform Event Organizer berbasis web yang dirancang untuk membantu
                Anda mengelola acara dengan efisien dan profesional.
                Mulai dari klien, vendor, hingga jadwal acara, semua dapat Anda kontrol dalam satu tempat dengan
                antarmuka yang mudah digunakan.
            </p>
        </div>
    </section>

    <!-- Bagaimana Kami Dapat Membantu -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center">Bagaimana Kami Dapat Membantu Anda?</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-10">
                    <p class="text-center">
                        Dengan sistem terintegrasi, Event Ease membantu Anda dalam perencanaan acara dari awal hingga
                        akhir.
                        Anda dapat memantau progres acara, mengatur jadwal, mengelola mitra vendor, dan menjaga
                        komunikasi yang baik dengan klien.
                        Semua proses menjadi lebih cepat, akurat, dan terdokumentasi dengan baik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-people-fill"></i></div>
                        <h5>Manajemen Klien</h5>
                        <p>Kelola data klien dan histori acara mereka dengan mudah dan rapi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-calendar-event-fill"></i></div>
                        <h5>Manajemen Acara</h5>
                        <p>Atur acara dari tanggal, tempat, hingga rincian aktivitasnya.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-journal-bookmark-fill"></i></div>
                        <h5>Kategori Acara</h5>
                        <p>Klasifikasikan jenis acara untuk pelaporan dan analisis yang lebih baik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-building"></i></div>
                        <h5>Manajemen Vendor</h5>
                        <p>Simak dan kelola vendor yang terlibat dalam setiap acara Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-clock-history"></i></div>
                        <h5>Jadwal Acara</h5>
                        <p>Susun dan kelola timeline acara secara detail dan terstruktur.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon-feature"><i class="bi bi-person-circle"></i></div>
                        <h5>Profil Pengguna</h5>
                        <p>Kelola informasi akun Anda dan peran pengguna dengan aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 bg-white border-top">
        <p class="mb-0">&copy; {{ date('Y') }} Event Ease. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
