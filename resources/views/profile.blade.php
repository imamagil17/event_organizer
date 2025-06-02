<x-default-layout title="Profil Pengguna" section_title="Profil Akun">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <!-- Header Profil -->
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 4rem; color: #0d6efd;"></i>
                            </div>
                            <h4 class="card-title fw-bold">{{ $user->name }}</h4>
                            <p class="text-muted fst-italic small">
                                Terakhir login: {{ $user->updated_at->diffForHumans() }}
                            </p>
                        </div>

                        <!-- Informasi Akun -->
                        <div class="mb-4">
                            <h5 class="text-primary fw-semibold mb-3">Informasi Akun</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-envelope-fill me-2 text-secondary"></i> Email</span>
                                    <span class="text-break">{{ $user->email }}</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-shield-lock-fill me-2 text-secondary"></i> Role</span>
                                    <span class="text-capitalize fw-semibold">{{ $user->role }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
