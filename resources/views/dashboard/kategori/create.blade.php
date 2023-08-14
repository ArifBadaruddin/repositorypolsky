@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Kategori</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ url('/dashboard/kategori/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Jenis Kategori</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" readonly>
                  </div>

                  <button type="submit" class="btn btn-primary mt-2">Tambah Kategori</button>
            
            </form>
        </div>
        


    </div>
</div>

<script>
    const name= document.querySelector('#name');
      const slug= document.querySelector('#slug');
  
  
      name.addEventListener('change', function() {
        fetch('/dashboard/kategori/checkSlug?name=' + name.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });
  
  
      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      })
  
  
  
  </script>
  

@endsection