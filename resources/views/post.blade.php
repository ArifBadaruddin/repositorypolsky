@extends('layouts.main')

@section('container')

<div class="container">
   <div class="row">
      <div class="col mt-3 mb-4" style="color: #E552E0">
         <h1>search</h1>
         {{-- breadcrumb (opsional) --}}
      </div>
      <hr>
   </div>
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
            {{-- titile --}}
            <h1 class="mt-2">{{ $post->title }}</h1>
            <hr>
         </div>
         <div class="row">
            <div class="col-3">
               {{-- image --}}
               @if ($post->image)
               <div style="max-height: 50px; overflow:hidden">
               <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
               </div>
               @else
               <img src="https://source.unsplash.com/1000x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
               @endif

               <div class="row">
                  {{-- <p>Oleh <a href="/authors/{{ $post->user->nama }}" class="text-decoration-none">{{ $post->user->ketua }} </a> 
                     in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p> --}}
                  <h5>Author</h5>
                  <a href="/authors/{{ $post->user->author }}" class="text-decoration-none">{{ $post->user->author }} </a> 
                  <h5>Date</h5>
                  <h5>Category</h5>
                  <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>

               </div>

            </div>
            <div class="col">
               {{-- abstrak --}}
               <article class="">

                  {!! $post->body !!}
                  {{-- {{ $post->body }} --}}
               </article>
               {{-- /abstrak --}}

               {{-- url --}}


               {{-- /url --}}

               {{-- back --}}
               <a href="/posts" class="text-decoration-none">Kembali ke Home</a>
               {{-- /back --}}


            </div>
         </div>
      </div>
      <div class="col-3">
         {{-- listgroup --}}
            <ul class="list-group ">
              <li class="list-group-item " style="background-color: #E552E0; color:#ffffff" aria-current="true">An active item</li>
              <li class="list-group-item">A second item</li>
              <li class="list-group-item">A third item</li>
              <li class="list-group-item">A fourth item</li>
              <li class="list-group-item">And a fifth one</li>
            </ul>
      </div>
   </div>

   
   
</div>




   @endsection