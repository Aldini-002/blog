<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $page_active === 'dashboard' ? 'active' : '' }}" href="/dashboard">
                    Dashboard
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ $page_active === 'admin_blog' ? 'active' : '' }}" href="/admin/blogs">
                    Blogs
                </a>
            </li>
            @can('admin')
                <li class="nav-item ">
                    <a class="nav-link {{ $page_active === 'admin_category' ? 'active' : '' }}" href="/admin/categories">
                        Categories
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</nav>
