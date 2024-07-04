<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">ajig</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"><i class="bi bi-three-dots"></i></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/dashboard">
            <i class="bi bi-house-door-fill"></i> <!-- Ikon untuk Dashboard -->
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/posts">
            <i class="bi bi-file-earmark-text-fill"></i> <!-- Ikon untuk My Posts -->
            My Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="/dashboard/category">
            <i class="bi bi-tag-fill"></i> <!-- Ikon untuk Category Post -->
            Tambah Category(only admin)
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="/allowed_usernames">
            <i class="bi bi-person-plus-fill"></i> <!-- Ikon untuk Menambahkan Admin -->
            Menambahkan Admin(only admin)
          </a>
        </li>
      </ul>
      <hr class="my-3">

      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
          onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
           <i class="bi bi-box-arrow-right"></i> <!-- Ikon untuk Logout -->
           Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>
