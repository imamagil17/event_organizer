@props(['title' => 'Event Organizer', 'section_title' => 'Menu'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        transform: translateY(-3px);
        transition: all 0.2s ease-in-out;
    }
</style>

<body>
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Event Organizer</h2>

            <!-- Desktop Navigation -->
            <nav>
                <ul class="navbar-nav d-none d-lg-flex flex-row gap-4">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}">
                            <i class="bi bi-house-door me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('kliens.index') }}"
                            class="nav-link text-white {{ request()->is('kliens*') ? 'active' : '' }}">
                            <i class="bi bi-people-fill me-1"></i> Klien
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('acaras.index') }}"
                            class="nav-link text-white {{ request()->is('acaras*') ? 'active' : '' }}">
                            <i class="bi bi-calendar-event-fill me-1"></i> Acara
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('kategori_acaras.index') }}"
                            class="nav-link text-white {{ request()->is('kategori_acaras*') ? 'active' : '' }}">
                            <i class="bi bi-journal-bookmark-fill me-1"></i> Kategori Acara
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('profile.index') }}"
                            class="nav-link text-white {{ request()->is('profile') ? 'active' : '' }}">
                            <i class="bi bi-person-circle me-1"></i> Profile
                        </a>

                    </li>
                </ul>
            </nav>

            <!-- Mobile Navigation -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse d-lg-none mt-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kliens.index') }}" class="nav-link">Klien</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('acaras.index') }}" class="nav-link">Acara</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori_acaras.index') }}" class="nav-link">Kategori Acara</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
                </li>
            </ul>
        </div>
    </header>

    <main class="container mt-4">
        <h1 class="text-3xl fw-bold">{{ $section_title }}</h1>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            @if (session('success'))
                <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert"
                    aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastElement = document.getElementById('successToast');
                if (toastElement) {
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            });
        </script>

        {{-- Flash message
        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif --}}

        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
