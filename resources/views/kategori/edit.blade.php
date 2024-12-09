@extends('layouts.master')
@section('content')
    <div class="container">
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <h2>Edit Kategori</h2>
            @if ($errors)
            @foreach ($errors->all() as $item)
            <p class="text-danger"> {{$item}}</p>
            @endforeach
            @endif
            <form class="user" action="{{ route('kategori.aksi_edit',$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="tittle" value="{{$category->tittle}}" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukan Judul" >
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