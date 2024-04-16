@extends('sb-admin/app')
@section('title', 'Kemanusiaan')
@section('kemanusiaan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/kemanusiaan/{{$kemanusiaan->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/kemanusiaan" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/kemanusiaan/{{$kemanusiaan->gambar1}}" height="250px" class="card-img-top mb-4" alt="...">
        <img src="/upload/kemanusiaan/{{$kemanusiaan->gambar2}}" height="250px" class="card-img-top mb-4" alt="...">
        <img src="/upload/kemanusiaan/{{$kemanusiaan->gambar3}}" height="250px" class="card-img-top mb-4" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$kemanusiaan->title}}</h2>
            <h4 class="card-title">{{$kemanusiaan->subtitle}}</h4>
            <p class="card-text">{!!$kemanusiaan->konten!!}</p>
            <p class="card-text"><small class="text-muted">{{$kemanusiaan->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection