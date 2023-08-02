@extends('layouts.second')

@section('container')

<img class="wave" src="img/gelombang.png">
	<div class="container">
		<div class="img">
			<img src="img/people.svg">
		</div>
		<div class="login-content">

            {{-- notif login berhasil --}}
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
          </button>
        </div>
         
        @endif
			<form action="/login" method="post">
         
				<img src="/img/Politeknik Sekayu.png">
				<h2 class="title">Login Sistem Repository</h2>

                @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="nomorinduk" class="form-control @error('nomorinduk') is-invalid @enderror" id="nomorinduk" placeholder="nomorinduk" autofocus required>
                  <label for="nomorinduk">Username</label>
                  @error('nomorinduk') 
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div> 
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>

                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>

  
@endsection
