

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse" style="background-color: #14202C">
    <div class="position-sticky pt-3">
      @can('notadmin')
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/index') ? 'active' : '' }}"  href="/dashboard" style="color: #fff ">
            <span data-feather="codesandbox"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts" style="color: #fff ">
            <span data-feather="folder"></span>
            Karya Ilmiah
          </a>
        </li>

      </ul>
    @endcan

      @can('admin') 
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Admin</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/index') ? 'active' : ''}}" href="/dashboard" style="color: #fff ">
            <span data-feather="codesandbox"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts" style="color: #fff ">
            <span data-feather="folder"></span>
            Karya Ilmiah
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : ''}}" href="/dashboard/kategori" style="color: #fff ">
            <span data-feather="list"></span>
            kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users') ? 'active' : ''}}" href="/dashboard/users" style="color: #fff ">
            <span data-feather="users"></span>
            user
          </a>
        </li>
      </ul>
      @endcan
   
      </div>
    </div>

    
  </nav>

