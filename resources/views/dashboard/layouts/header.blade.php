<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #14202C">
  <a class="navbar-brand col-lg-2 me-0 px-3" href="#">
    <img src="img/header title.png" alt="" width="120px" >
  </a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="" aria-label="Search">


  


  <div class="dropdown text-end px-3 justify-content-right">
    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle " id="dropdownUser1"
      data-bs-toggle="dropdown" aria-expanded="false">
      <img src="img/blank.jpg" width="32" height="32" class="rounded-circle border border-light">
      {{ Auth()->user()->nama }}
    </a>
    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="/posts">Artikel</a></li>
      <li><a class="dropdown-item" href="/dashboard/password">Ganti Password</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
            <div class="navbar-nav">
              <div class="nav-item text-nowrap">
                {{-- <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link px-3 bg-dark border-0"> Logout<span
                      data-feather="log-out"></span> </button>
                </form> --}}
              </div>
            </div>
          </form>
      </li>
    </ul>
    </div>
    
</header>