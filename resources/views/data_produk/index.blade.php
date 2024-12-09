@extends('layouts.master')
@section('content')
<style>
    .col-judul {
        width: 15%; 
    }
    .col-deskripsi {
        width: 30%; 
    }
    .col-file {
        width: 40%; 
    }
    .col-aksi {
        width: 10%;
    }
    
</style>

<div class="container mt-3">
    <h4>Data Produk</h4>
        <div class="card-body">
            <a href="{{route('data_produk.tambah')}}" class="btn btn-primary mb-2">Tambah Produk</a>
            <div class="table-responsive">

            <table class="table" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th class="col-judul">Judul</th>
            <th class="col-deskripsi">Deskripsi</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th class="col-file">File</th>
            <th class="col-aksi">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $no=1;
        @endphp
        @foreach ($products as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item->title}}</td>
            <td>{!!$item->description!!}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount}}</td>
            <td><img src="{{asset($item->file)}}" width="40%" alt=""></td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="{{route('data_produk.edit',$item->id)}}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{route('data_produk.aksi_hapus',$item->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            </div>
</div>
</div>
@endsection