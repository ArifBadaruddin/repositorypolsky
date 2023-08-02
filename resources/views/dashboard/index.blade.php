@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
 
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="table-responsive ">

  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-sm-3">
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">
              <h5>Karya Ilmiah Publik</h5>
            </div>
            <div class="card-body">
              <span data-feather="database"></span>
              <h5 class="card-title">counter</h5>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">
              <h5>Kategori</h5>
            </div>
            <div class="card-body">
              <span data-feather="list"></span>
              <h5 class="card-title">counter</h5>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">
              <h5>Data User</h5>
            </div>
            <div class="card-body">
              <span data-feather="users"></span>
              <h5 class="card-title">counter</h5>
            </div>
          </div>
        </div>
      </div>
      <!--md agar responsif-->
      <div class="card col-4 mb-3" style="width: 18rem;">
        <img src="img/arif.jpg" class="card-img-top rounded-circle border border-5 border-grey mt-1" alt="..." width="100px">
        
      </div>
      <div class="card border-secondary col-sm-6 mb-3 ">
        <div class="card-body text-dark">
          <div class="card-body">

            <h5 class="card-title"> Nama : {{ Auth()->user()->nama }}</h5>
            <h5 class="card-title mt-1">ID User</h5>
            <h6 class="card-text"> {{ Auth()->user()->nomorinduk }}</h6>
            <h5 class="card-title mt-3">Status</h5>
            <h6 class="card-text"> {{ Auth()->user()->status }}</h6>
          </div>
          
          
        </div>
      </div>

    </div>
  </div>
</div>

    


@endsection