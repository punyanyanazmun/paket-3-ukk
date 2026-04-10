<div class="col-lg-3">
    <div class="sidebar-panel">
        <div>
            <div class="d-flex align-items-center mb-4">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div>
                    <h5 class="mb-0">Aplikasi</h5>
                    <small class="text-white-50">Pengaduan Sarana</small>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a href="/dashboard" class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="/aspirasi" class="list-group-item list-group-item-action {{ request()->is('aspirasi') ? 'active' : '' }}">
                    <i class="fas fa-list me-2"></i> Kelola Aspirasi
                </a>
            </div>
        </div>
        <div>
            <form action="/logout" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="list-group-item list-group-item-action text-start w-100 border-0">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>