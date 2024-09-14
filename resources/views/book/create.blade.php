@extends('layouts.master')

@section('judul')
    Halaman Tambah Buku
@endsection

@section('content')
<form method="POST" action="/book" enctype="multipart/form-data">
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
      <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
      <label>Ringkasan Buku</label>
      <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label>Gambar Buku</label>
      <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
      <label>Stok Buku</label>
      <input type="number" name="stock" class="form-control">
    </div>
    <div class="form-group">
      <label>Kategori Buku</label>
      <select name="category_id" class="form-control">
        <option value="">---Pilih Kategori---</option>
        @forelse ($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @empty
            <option value="">Tidak ada kategori</option>
        @endforelse
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection