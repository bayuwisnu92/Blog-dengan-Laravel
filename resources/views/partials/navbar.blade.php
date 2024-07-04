<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-three-dots"></i> <!-- Ikon untuk Toggle Navigation -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'home' ? 'active' : '') }}" aria-current="page" href="/">
                        <i class="bi bi-house-door-fill"></i> <!-- Ikon untuk Home -->
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'all posts' ? 'active' : '') }}" href="/blog">
                        <i class="bi bi-file-earmark-text-fill"></i> <!-- Ikon untuk Blog -->
                        Blog
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-tags-fill"></i> <!-- Ikon untuk Categories -->
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'about' ? 'active' : '') }}" href="/about">
                        <i class="bi bi-info-circle-fill"></i> <!-- Ikon untuk About -->
                        About
                    </a>
                </li>
                
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> <!-- Ikon untuk User -->
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i> <!-- Ikon untuk Logout -->
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-speedometer2"></i> <!-- Ikon untuk Dashboard -->
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'login' ? 'active' : '') }}" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i> <!-- Ikon untuk Login -->
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'register' ? 'active' : '') }}" href="/register">
                            <i class="bi bi-pencil-square"></i> <!-- Ikon untuk Register -->
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
