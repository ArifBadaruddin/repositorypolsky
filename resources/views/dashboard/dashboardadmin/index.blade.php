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

<div class="table-responsive col-lg-8">

  <div class="container">
    <div class="row ">
      <!--md agar responsif-->
      <div class="card border-secondary col-4 mb-3" style="width: 18rem;">
        <img src="img/Politeknik Sekayu.png" class="card-img-top rounded-circle" alt="...">
        <div class="card-body">

          <h5 class="card-title">Nama Poktan</h5>
          <p class="card-text"> {{ Auth()->user()->nama_poktan }}</p>
          <h5 class="card-title mt-4">ID Poktan</h5>
          <p class="card-text"> {{ Auth()->user()->id_poktan }}</p>
          <h5 class="card-title mt-4">NIK Ketua</h5>
          <p class="card-text"> {{ Auth()->user()->NIK }}</p>
        </div>
      </div>
      <div class="card border-secondary col-md-4 mb-3">
        <div class="card-body text-dark">
          <img class="card-image-top rounded-circle" src="img/arif.jpg" alt="">
          
        </div>
      </div>

        </div>
      </div>
    </div>
  </div>
    
    
@endsection


