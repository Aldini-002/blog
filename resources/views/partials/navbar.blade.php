<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">BLOGS_002</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $page_active === 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $page_active === 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ $page_active === 'blogs' ? 'active' : '' }}" href="/blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $page_active === 'categories' ? 'active' : '' }}"
                            href="/categories">Categories</a>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profiel</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/signout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ $page_active === 'signin' ? 'active' : '' }}" href="/signin">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $page_active === 'signup' ? 'active' : '' }}" href="/signup">Sign up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
