@extends('layouts.master')
@section('content')
<div class="container mt-3">
    <h4>Data Kategori</h4>
        <div class="card-body">
            <a href="{{route('kategori.tambah')}}" class="btn btn-primary mb-2">Tambah Kategori</a>
            <div class="table-responsive">

                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @php 
                            $no=1;
                        @endphp
                        @foreach ($category as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{route('kategori.edit',$item->id)}}" class="btn btn-warning me-2">Edit</a>
                                    <form action="" method="post">
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