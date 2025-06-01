<x-default-layout title="Profil Pengguna" section_title="Profil Akun">
    <div class="container mt-5">
        <!-- Card untuk Profil Pengguna -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <!-- Header Card -->
                <div class="mb-4">
                    <h5 class="card-title font-weight-bold text-primary">{{ $user->name }}</h5>
                    <p class="text-muted">
                        <small>Terakhir login: {{ $user->updated_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Informasi Akun -->
                <div class="mb-4">
                    <h6 class="font-weight-bold text-secondary">Informasi Akun</h6>
                    <p class="card-text"><strong>Email : </strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Peran : </strong> <span
                            class="text-capitalize">{{ $user->role }}</span></p>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger px-4 py-2">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
