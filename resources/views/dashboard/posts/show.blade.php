@extends('dashboard.layouts.main')

@section('container')

<div class="container">
   <div class="row">
      <div class="mt-3 mb-3">
         <a href="/dashboard/posts" class="btn btn-primary"><span data-feather="arrow-left"></span> Kembali Ke Menu Post</a>
         <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
         <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
           @method('delete')
           @csrf
           <button class="btn btn-danger border-0" onclick="return confirm('apakah yakin ingin menghapus data')">
             <span data-feather="trash-2"></span>Hapus</button>
           </form>
        </div>
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
            <a href="{{ asset('storage' .$post->dokumen) }}">pdf</a>
            {{-- <p>Oleh <a href="/authors/{{ $post->user->nama }}" class="text-decoration-none">{{ $post->user->ketua }} </a> 
               in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p> --}}
            <h5>Author</h5>
            {{-- <a href="/authors/{{ $post->user->nama }}" class="text-decoration-none">{{ $post->user->nama }} </a>  --}}
            <h5>Date</h5>
            <h5>Category</h5>
            <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>

         </div>

      </div>
      <div class="col">
         {{-- abstrak --}}
         <article class="justify-content">

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
 

@endsection