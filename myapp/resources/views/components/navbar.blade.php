<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
        <span class="navbar-text ms-3">
            <strong>{{ auth()->user()->name }}</strong> ({{ ucfirst(auth()->user()->role) }})
        </span>
        <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm me-3">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>