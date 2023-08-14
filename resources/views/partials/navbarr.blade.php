{{-- style="background-color:#e8f5e9" --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #E552E0">
    <div class="container">
      {{-- tambah logo, ganti judul jadi repository --}}

      <a class="navbar-brand" href="/">
        <img src="img/Politeknik Sekayu.png" width="40" height="40"  class="me-md-2">
        <img src="img/header title.png"  height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "login") ? 'active' : '' }} " href="/">Home</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' : '' }} " href="/blog">Posts</a>
          </li>  
        </ul> --}}
        
        {{-- isolated home --}}
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('/') ? 'active' : ''}} " href="/">Home</a>
        </li>  

        {{-- active artikel jadi home "/" --}}
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('posts') ? 'active' : ''}} " href="/posts">Repository Search</a>
        </li>  

        {{-- isolate kategori --}}
        {{-- <li class="nav-item">
          <a class="nav-link  {{ Request::is('categories') ? 'active' : ''}} " href="/categories">Kategori</a>
        </li>  --}}

      </ul>
        
      @auth
      <div class="flex-shrink-0 dropdown ms-auto navbar-dark">
        
        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="img/blank.jpg" alt="mdo" width="32" height="32" class="rounded-circle border border-light">
          {{ Auth()->user()->nama }}
          
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
          <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item"></i> Logout</button>
            </form>
          </li>
    
        </ul>
      </div>
      @else
      <div class="col-md-3 text-end ms-auto">
        <a href="/login" class="btn btn-outline-light me-2  {{ ($title === "login") ? 'active' : '' }}">Login</a>
      </div>
      {{-- <li class="nav-item">
        <a href="/login" class="nav-link {{ ($title === "login") ? 'active' : '' }}">Login</a>
      </li> --}}
      @endauth




      </div>
    </div>
  </nav>
  