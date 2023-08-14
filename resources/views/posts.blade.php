
@extends('layouts.main')

@section('container')







@if ($posts->count())

{{-- carousel  --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        {{-- carousel item 1 --}}
        <div class="carousel-item active" style="height: 450px">
          <img src="img/itemone.png" class="d-block w-100" alt="..."  >
        </div>
   

        {{-- carousel item 2 --}}
        <div class="carousel-item" style="height: 450px">
          <img src="img/itemtwo.png" class="d-block w-100" alt="...">
        </div>

        {{-- carousel item 3 --}}
        <div class="carousel-item" style="height: 450px" >
          <img src="img/itemone.png" class="d-block w-100" alt="...">
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

{{-- /carousel --}}

{{-- heading --}}
<h1 class=" mt-5 mb-5 text-center " style="color: #E552E0 ">{{ $title }}</h1> 
<hr>
{{-- harusnya judul untuk "search", jika berubah, jadikan breadcrumb --}}
{{-- /heading --}}

{{-- layout content --}}
<div class="container">

  <div class="row">
    <div class="col-9">
      <div class="row">
        <div class="col-3">
          {{-- dropdown --}}
          <div class="dropdown">
            <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              All of Polsky Repository
            </a>
          
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
          {{-- /dropdown --}}
        </div>
        <div class="col-9">
          {{-- search --}}
          <form action="/posts">

            {{-- biar url tetap di category --}}
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari.." name="search" value="{{ request('search') }}">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </div>
          </form>
          {{-- /search --}}

        </div>
      </div>
      <div class="row">
        <hr>
        {{-- post --}}
        @foreach ($posts->skip(0) as $post)
        <div class="card mb-3" style="max-width: 830px;">
          <div class="row g-0">
            @if ($post->image)
            
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded-start" style="width: 150px; height:150px">
            
            @else
            <img src="img/Post.png" class="img-fluid rounded-start"  alt="{{ $post->category->name }}" style="width: 150px; height:150px">
            @endif
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p>
                {{ $post->created_at->diffForHumans() }}
                
                  </small>
                </p>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{-- /post --}}
      </div>

    </div>

    {{-- list group --}}
    <div class="col-3">
      <ul class="list-group ">
        <li class="list-group-item " style="background-color: #E552E0; color:#ffffff" aria-current="true">All of Politeknik Sekayu</li>
        <li class="list-group-item">Teknik Informatika</li>
        <li class="list-group-item">Akuntansi</li>
        <li class="list-group-item">Teknik Pendingin TU</li>
        <li class="list-group-item">e-Journal</li>
        <li class="list-group-item">Tugas Akhir</li>
        <li class="list-group-item">Pedoman Karya Ilmiah</li>
      </ul>

    </div>
    {{-- /list gorup --}}
  </div>
</div>
{{-- /layout content --}}



    
@else

<P class="text-center fs-3">Postingan Tidak Ditemukan</P>
    
@endif

<div class="d-flex justify-content-center">
  {{ $posts-> links() }}
</div>


        
   @endsection