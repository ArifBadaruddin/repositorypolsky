@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Karya Ilmiah</h1>
  
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="row justify-content-center">
  <div class="col-md-6">
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Karya Ilmiah" name="keyword"  aria-describedby="basic-addon2">
        <button class="input-group-text btn btn-info" id="basic-addon2">Cari</button>
      </div>

      {{-- biar url tetap di category
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari.." name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Cari</button>
      </div> --}}
    </form>
  </div>
</div>

<div class="table-responsive col-lg-12">

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>Tambah Karya ilmiah</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">author</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            
            <td>
                <a href="/dashboard/posts/{{ $post->slug }}"
                 class="badge bg-info"> <span data-feather="eye"></span></a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin ingin menghapus data')">
                  <span data-feather="trash-2"></span></button>
                </form>
                
            </td>
          
          </tr>  
        @endforeach
       
      </tbody>
    </table>
  </div>
@endsection