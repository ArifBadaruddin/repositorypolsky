@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data User</h1>
</div>



<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="/dashboard/users/store" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username; email;" name="username" required autofocus value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nomorinduk" class="form-label">ID Institusi</label>
                    <input type="text" class="form-control @error('nomorinduk') is-invalid @enderror" id="nomorinduk" placeholder="NIDN/ NIM" name="nomorinduk" required autofocus value="{{ old('nomorinduk') }}">
                    @error('nomorinduk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" required autofocus value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Mahasiswa, Dosen, Pegawai" name="status" required autofocus value="{{ old('status') }}">
                    @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" placeholder="Teknik Informatika/ Akuntansi/ Teknik Pendingin" name="prodi" required autofocus value="{{ old('prodi') }}">
                    @error('prodi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>


    </div>
</div>

<script>

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })



</script>

@endsection