@extends('layouts.master')

@section('judul')
    Halaman Edit Buku
@endsection

@section('content')
<form method="POST" action="/book/{{$book->id}}" enctype="multipart/form-data">
  @method("PUT")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="form-group">
      <label>Nama Buku</label>
      <input type="text" name="title" class="form-control" value="{{$book->title}}">
    </div>
    <div class="form-group">
      <label>Ringkasan Buku</label>
      <textarea name="summary" class="form-control" cols="30" rows="10">{{$book->summary}}</textarea>
    </div>
    <div class="form-group">
      <label>Gambar Buku</label>
      <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
      <label>Stok Buku</label>
      <input type="number" name="stock" class="form-control" value="{{$book->stock}}">
    </div>
    <div class="form-group">
      <label>Kategori Buku</label>
      <select name="category_id" class="form-control">
        <option value="">---Pilih Kategori---</option>
        @forelse ($categories as $item)
          @if ($item->id === $book->category_id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option>
          @else
            <option value="{{$item->id}}">{{$item->name}}</option>
          @endif
        @empty
            <option value="">Tidak ada kategori</option>
        @endforelse
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection