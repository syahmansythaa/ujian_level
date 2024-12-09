@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <h2>Tambah Produk</h2>
                @if ($errors)
                    @foreach ($errors->all() as $item)
                        <p class="text-danger"> {{$item}}</p>
                    @endforeach
                @endif
                <form class="user" action="{{ route('data_produk.aksi_tambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" name="tittle" class="form-control form-control-user" placeholder="Masukan Judul" >
                    </div>
                    <div class="form-group mb-3">
                        <select name="category_id" class="form-control" id="">
                            <option value="">Pilih Kategori</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->tittle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="price" class="form-control form-control-user" placeholder="Masukan Harga" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" name="discount" class="form-control form-control-user" placeholder="Masukan Diskon" >
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" class="form-control editor" placeholder="Masukan Deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" name="file" accept=".jpg, .png, .pdf, .docx" class="form-control form-control-user">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-user">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        var ext_toolbar = [ 
            'heading', '|', 'bold', 'italic', 'link', 'numberedList', 'bulletedList', '|', 'outdent', 'indent', '|', 'undo', 'redo', '|', 'uploadImage', 'insertTable', 'alignment',
        ];
        ClassicEditor
            .create(document.querySelector('.editor'), {
                alignment: {
                    options: ['left', 'right']
                },
                toolbar: ext_toolbar
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
@endsection