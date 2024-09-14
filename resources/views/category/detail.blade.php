@extends('layouts.master')

@section('judul')
    Halaman Detail Kategori
@endsection

@section('content')
  <div class="mb-3">
    <a href="/category" class="btn btn-secondary">Kembali</a>
  </div>

  <div>
    <h2 class="text-bold">Kategori Buku {{$category->name}}</h2>
    <p>{{$category->description}}</p>
  </div>

  <div>
    <h2 class="text-bold">List Buku</h2>
    <div class="row">
      @forelse ($category->bookList as $item)
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <img src="{{asset('images/' . $item->image)}}" height="300px" alt="...">
            <div class="card-body">
              <h3 class="text-bold">{{$item->title}}</h3>
              <p class="card-text text-justify">{{Str::limit($item->summary, 100)}}</p>
              <a href="/book/{{$item->id}}" class="btn btn-primary btn-block">Selengkapnya</a>
            </div>
          </div>
        </div>
      @empty
        <h1>Tidak ada buku di daam kategori ini</h1>
      @endforelse
    </div>
  </div>
@endsection