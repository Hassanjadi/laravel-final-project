@extends('layouts.master')

@section('judul')
    Halaman Data Buku
@endsection

@section('content')
    @auth
    <div>
      <a href="/book/create" class="btn btn-primary mb-3">Tambah Buku</a>
    </div>
    @endauth

      <div class="row">
        @forelse ($book as $item)
          <div class="col-4">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('images/' . $item->image)}}" class="card-img-top" height="300" alt="...">
              <div class="card-body">
                <h3 class="text-bold">{{$item->title}}</h3>
                <span class="badge badge-success">{{$item->category->name}}</span>
                <span class="badge badge-warning">Stok: {{$item->stock}}</span>
                <p class="card-text text-justify">{{Str::limit($item->summary, 100)}}</p>
                <a href="/book/{{$item->id}}" class="btn btn-primary btn-block">Detail Buku</a>
                @auth
                <div class="row mt-2">
                  <div class="col-6">
                    <a href="/book/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                  </div>
                  <div class="col-6">
                    <form action="/book/{{$item->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class="btn btn-danger btn-block" >
                    </form>
                  </div>
                </div>
                @endauth
              </div>
            </div>
          </div>
        @empty
          <p>Tidak ada buku</p>
        @endforelse
    </div>
    @endsection