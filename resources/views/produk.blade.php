@extends('layouts.master')
@section('content')
<div class="container mt-3">
    <h5>Produk Saya</h5>
    <ul class="list-group list-group-horizontal mt-3 flex-center">
    <a href="{{route('produk')}}" class="text-decoration-none">
        <li class="list-group-item btn btn-primary">Semua</li>
    </a>
    @foreach ($category as $item)
    <a href="{{route('produk')}}?category={{$item->id}}" class="text-decoration-none">
        <li class="list-group-item btn btn-primary">{{$item->title}}</li>
    </a>
    @endforeach
    </ul>
    <div class="row mt-3">
    @foreach ($product as $item)
    <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card" style="width: 100%;">
            <img src="{{ $item->file }}" class="card-img-top" alt="{{ $item->tittle }}">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <b class="text-black mt-8">Rp {{ number_format($item->price - $item->discount) }}</b>
                @if ($item->discount > 0)
                    <del>Rp {{ number_format($item->price) }}</del>
                @endif
                <br>
                <a href="https://api.whatsapp.com/send?phone=6285218807836&text=Hallo Saya ingin membeli produk {{$item->tittle}}" 
                   class="text-blue btn btn-primary mt-2">
                   Order via WhatsApp
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


</div>

@endsection