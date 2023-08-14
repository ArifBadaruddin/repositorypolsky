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
      
      <!--md agar responsif-->
      <div class="card col-4 mb-3" style="width: 18rem;">
        <img src="img/blank.jpg" class="card-img-top rounded-circle border border-5 border-grey mt-1" alt="..." width="100px">
        
      </div>
      <div class="card border-secondary col-sm-6 mb-3 ">
        <div class="card-body text-dark">
          <div class="card-body">

            <h3 class="card-title">{{ Auth()->user()->nama }}</h3>
            <h5 class="card-title mt-2" style="color: #E552E0 ">ID User</h5>
            <h6 class="card-text"> {{ Auth()->user()->nomorinduk }}</h6>
            <h5 class="card-title mt-2" style="color: #E552E0 ">Program Studi</h5>
            <h6 class="card-text"> {{ Auth()->user()->prodi}}</h6>
            <h5 class="card-title mt-1" style="color: #E552E0 ">Status</h5>
            <h6 class="card-text"> {{ Auth()->user()->status }}</h6>
          </div>
          
          
        </div>
      </div>

    </div>
  </div>
</div>

    


@endsection