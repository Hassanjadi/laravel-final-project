@extends('layouts.master')

@section('judul')
    Halaman Detail Buku
@endsection

@section('content')
    <div>
        <a href="/book" class="btn btn-secondary mb-3">Kembali</a>
    </div>

    <div class="mb-5">
        <img src="{{asset('/images/' . $book->image)}}" height="300px" width="100%" alt="...">
    </div>
    <div>
        <h2 class="text-bold">{{$book->title}}</h2>
        <p>{{$book->summary}}</p>
    </div>

    <hr>

    @auth   
    <div class="mb-5">
        <h2 class="text-bold">Formulir Peminjaman Buku</h2>
        <form action="/borrow/{{$book->id}}" method="post">
            @csrf
            <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="date" name="tanggal_peminjaman" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" class="form-control">
            </div>
            <input type="submit" value="Kirim" class="btn btn-primary btn-block">
        </form>
    </div>

    <div>
        <h2 class="text-bold">Data Peminjaman Buku</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($book->borrowList as $item)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->createdBy->name}}</td>
                <td>{{$item->tanggal_peminjaman}}</td>
                <td>{{$item->tanggal_pengembalian}}</td>
                </tr>
                @empty
                    <h5>Peminjaman buku kosong</h5>
                @endforelse
            </tbody>
        </table>
    </div>
    @endauth
@endsection