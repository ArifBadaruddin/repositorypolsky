@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah postingan Baru</h1>
</div>

<div class="col-lg-8">
  <form method="POST" action="{{ url('/dashboard/posts/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Penulis</label>
      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" required autofocus value="{{ old('author') }}">
      @error('author')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" readonly>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Kategori</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Gambar</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
       name="image" onchange="previewImage()" required>
      @error('image')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror    </div>
      <div class="mb-3">
        <label for="dokumen" class="form-label">PDF</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen"
         name="dokumen" required>
        @error('dokumen')
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Buat Postingan</button>
  </form>
</div>



<script>
  const title= document.querySelector('#title');
    const slug= document.querySelector('#slug');


    title.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    })


    // image previewImage
    function previewImage(){
      const image      = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;

      }
    }

    // // image previewImage
    // function previewPDF(){
    //   const dokumen      = document.querySelector('#dokumen');
    //   const PDFPreview = document.querySelector('.pdf-preview');

    //   PDFPreview.style.display = 'block';

    //   const oFReader = new FileReader();
    //   oFReader.readAsDataURL(dokumen.files[0]);

    //   oFReader.onload = function(oFREvent) {
    //     PDFPreview.src = oFREvent.target.result;

    //   }
    // }


</script>


@endsection