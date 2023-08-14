@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data User</h1>
  
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
        <input type="text" class="form-control" placeholder="Cari User" name="keyword" value="{{ request('keyword') }}"  aria-describedby="basic-addon2">
        <button class="input-group-text btn btn-info" id="basic-addon2">Cari</button>
      </div>
    </form>
  </div>
</div>
{{-- <div class="row justify-content-center mb-3 col-lg-8">
  <div class="col-md-6">
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Postingan" name="keyword"  aria-describedby="basic-addon2">
        <button class="input-group-text btn btn-info" id="basic-addon2">Cari</button>
      </div>
    </form>
  </div>
</div> --}}

<div class="table-responsive col-lg-12">
  <a href="/dashboard/users/create" class="btn btn-primary mb-3"><span data-feather="plus"></span>tambah user</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">ID_Institusi</th>
          <th scope="col">Status</th>
          <th scope="col">Program Studi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->nama}}</td>
            <td>{{ $user->nomorinduk }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->prodi }}</td>
            <td>
              <a href="/dashboard/users/{{ $user->id }}"
              
                 class="badge bg-info"> <span data-feather="eye"></span></a>

                <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
                <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
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

  <div class="d-flex justify-content-center">
    {{ $users->links() }}
  </div>
@endsection