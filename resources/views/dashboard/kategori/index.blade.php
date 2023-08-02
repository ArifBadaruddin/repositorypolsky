@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori </h1>
    
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="row justify-content-center mb-3 col-lg-12">
  <div class="col-md-6">
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Kategori" name="keyword" value="{{ request('keyword') }}"  aria-describedby="basic-addon2">
        <button class="input-group-text btn btn-info" id="basic-addon2">Cari</button>
      </div>
    </form>
  </div>
</div>

<div class="table-responsive col-lg-8">

    <a href="/dashboard/kategori/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>Tambah Kategori</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Jenis</th>
          
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            
            <td>
                <a href="/dashboard/kategori/{{ $category->slug }}"
                 class="badge bg-info"> <span data-feather="eye"></span></a>

                <a href="/dashboard/kategori/{{ $category->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                
                <form action="/dashboard/kategori/{{ $category->slug }}" method="post" class="d-inline">
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