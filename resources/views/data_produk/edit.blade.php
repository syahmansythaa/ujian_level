<!-- mengambil dan menampilkan halaman layouts master -->
@extends('layouts.master')
@section('content')
    <div class="container">
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <h2>Edit Produk</h2>
            @if ($errors)
            @foreach ($errors->all() as $item)
            <p class="text-danger"> {{$item}}</p>
            @endforeach
            @endif
            <form class="user" action="{{ route('data_produk.aksi_edit',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="tittle" value="{{$product->tittle}}" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukan Judul" >
                </div>
                <div class="form-group mb-3">
                    <select name="category_id" class="form-control" id="">
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}" @if ($item->id == $product->category_id) selected @endif>{{$item->tittle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <textarea name="description" value="" class="form-control editor" placeholder="masukan deskripsi" id="" cols="30" rows="3" >{{$product->description}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="number" name="price" value="{{$product->price}}" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukan Harga" >
                </div>
                <div class="form-group mb-3">
                    <input type="number" name="discount" value="{{$product->discount}}" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukan Diskon" >
                </div>
                <div class="form-group mb-3">
                    <input type="file" name="file" value="" accept="image/.jpg, .png, .pdf, .docx" class="form-control form-control-user" placeholder="Masukan File">{{$product->file}}
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-user">edit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        var ext_toolbar = [ 
 'heading', '|', 'bold', 'italic', 'link', 'numberedList', 'bulletedList', '|', 'outdent', 'indent', '|', 'undo', 'redo', '|', 'uploadImage', 'insertTable', 'alignment',
]
    ClassicEditor
    .create( document.querySelector(`.editor`), {
      alignment: {
        options: [ 'left', 'right' ]
      },
      toolbar: ext_toolbar
   
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( err => {
      console.error( err.stack );
    } );
    </script>
@endsection