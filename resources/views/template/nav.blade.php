<nav class="navbar navbar-light navbar-expand-lg bg-light p-3 sticky-top">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand text-success fw-semibold">SP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            @guest
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-success fw-semibold">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('login.view') }}" class="nav-link text-success fw-semibold">Login</a>
                </li>
            </ul>
            @endguest
            @auth
            @if(auth()->user()->role =='admin')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('admin.produk') }}" class="nav-link text-success fw-semibold">Product</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}" class="nav-link text-success fw-semibold">Category</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link text-success fw-semibold">User List</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('pelanggan.keranjang') }}" class="nav-link text-success fw-semibold">Keranjang</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pelanggan.summary') }}" class="nav-link text-success fw-semibold">Summary</a>
                </li>
            </ul>
            @endif
            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="p-2 pxs-3 bg-success text-white rounded-5 fw-bold">{{ auth()->user()->name }}</p>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-success fw-semibold">Logout</a>
                </li>
            </ul>
            @endauth



        </div>

    </div>
</nav>
