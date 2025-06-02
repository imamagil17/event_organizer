@props(['title' => 'Event Ease', 'section_title' => 'Menu'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet" />
</head>

<style>
    body {
        background: linear-gradient(to right, #f7f9fc, #e2e8f0);
        font-family: 'Poppins', sans-serif;
        padding-bottom: 2rem;
    }

    header.bg-dark {
        background: linear-gradient(to right, rgba(30, 30, 60, 0.85), rgba(20, 20, 40, 0.85));
        backdrop-filter: blur(16px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease-in-out;
    }

    .nav-link {
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #ffc107 !important;
        transform: translateY(-2px);
    }

    .nav-link.active {
        font-weight: 600;
        color: #ffc107 !important;
        border-bottom: 2px solid #ffc107;
    }

    .navbar-toggler {
        border: none;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 6px 10px;
        border-radius: 5px;
    }

    main.container {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        margin-top: 2rem;
    }

    h1 {
        font-size: 2rem;
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .toast {
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 128, 0, 0.2);
    }

    /* Hapus styling avatar karena gambarnya tidak dipakai */

    .dropdown-menu-end {
        right: 0;
        left: auto;
    }

    /* supaya dropdown muncul dengan benar */
    .nav-item.dropdown {
        position: relative;
    }

    @media (max-width: 768px) {
        main.container {
            padding: 1rem;
        }

        h1 {
            font-size: 1.5rem;
        }

        .navbar-nav {
            padding-left: 1rem;
        }

        header .container {
            flex-direction: column;
            align-items: start !important;
        }

        header h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
    }

    header.sticky-nav {
        position: sticky;
        top: 0;
        z-index: 1055;
        transition: background-color 0.3s ease, padding 0.3s ease, box-shadow 0.3s ease;
    }

    header.scrolled {
        background: linear-gradient(to right, rgba(25, 25, 50, 0.95), rgba(15, 15, 35, 0.95)) !important;
        padding: 0.75rem 1rem !important;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    header.scrolled h2 {
        font-size: 1.25rem;
        transition: font-size 0.3s ease;
    }

    .navbar-toggler-icon {
        filter: brightness(1000%);
    }

    /* Tambahan untuk toast-container */
    .toast-container {
        z-index: 1080;
        /* agar toast muncul di atas navbar */
    }
</style>

<body>
    <header class="bg-dark text-white p-3 sticky-nav" id="mainNavbar">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold">Event Ease</h2>

            <!-- Desktop Navigation -->
            <nav>
                <ul class="navbar-nav d-none d-lg-flex flex-row gap-4 align-items-center">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <i class="bi bi-house-door me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('kliens.index') }}"
                            class="nav-link {{ request()->is('kliens*') ? 'active' : '' }}">
                            <i class="bi bi-people-fill me-1"></i> Klien
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('acaras.index') }}"
                            class="nav-link {{ request()->is('acaras*') ? 'active' : '' }}">
                            <i class="bi bi-calendar-event-fill me-1"></i> Acara
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('kategori_acaras.index') }}"
                            class="nav-link {{ request()->is('kategori_acaras*') ? 'active' : '' }}">
                            <i class="bi bi-journal-bookmark-fill me-1"></i> Kategori Acara
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('vendors.index') }}"
                            class="nav-link {{ request()->is('vendors*') ? 'active' : '' }}">
                            <i class="bi bi-building me-1"></i> Vendor
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('jadwal_acaras.index') }}"
                            class="nav-link {{ request()->is('jadwal_acaras*') ? 'active' : '' }}">
                            <i class="bi bi-clock-history me-1"></i> Jadwal Acara
                        </a>
                    </li>

                    <!-- Profile dropdown tanpa gambar -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name ?? 'User' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown"
                            style="z-index: 1050;">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="bi bi-person me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="collapse navbar-collapse d-lg-none mt-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('kliens.index') }}" class="nav-link">Klien</a></li>
                <li class="nav-item"><a href="{{ route('acaras.index') }}" class="nav-link">Acara</a></li>
                <li class="nav-item"><a href="{{ route('kategori_acaras.index') }}" class="nav-link">Kategori Acara</a>
                </li>
                <li class="nav-item"><a href="{{ route('vendors.index') }}" class="nav-link">Vendor</a></li>
                <li class="nav-item"><a href="{{ route('jadwal_acaras.index') }}" class="nav-link">Jadwal Acara</a>
                </li>

                <!-- Mobile profile dropdown tanpa gambar -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                        id="profileDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name ?? 'User' }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdownMobile" style="z-index: 1050;">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                <i class="bi bi-person me-2"></i> Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST" class="m-0 px-3">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    <!-- Toast container diletakkan DI LUAR main agar fixed di pojok kanan bawah -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
        @if (session('success'))
            <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">{{ session('success') }}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <main class="container mt-4">
        <h1 class="fw-bold">{{ $section_title }}</h1>
        {{ $slot }}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show toast if exists
            var toastElement = document.getElementById('successToast');
            if (toastElement) {
                new bootstrap.Toast(toastElement).show();
            }

            // Navbar scroll effect
            const navbar = document.getElementById('mainNavbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 20) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
