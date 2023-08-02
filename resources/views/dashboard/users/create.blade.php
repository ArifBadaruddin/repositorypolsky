@extends('dashbaord.layouts.main')

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
                    <label for="nomorinduk" class="form-label">ID Institusi</label>
                    <input type="number" class="form-control @error('nomorinduk') is-invalid @enderror" id="nomorinduk" placeholder="NIDN/ NIM" name="nomorinduk" required autofocus value="{{ old('nomorinduk') }}">
                    @error('nomorinduk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            
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