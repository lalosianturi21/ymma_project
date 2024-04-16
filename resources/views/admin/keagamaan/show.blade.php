@extends('sb-admin/app')
@section('title', 'Keagamaan')
@section('keagamaan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/keagamaan/{{$keagamaan->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/keagamaan" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/keagamaan/{{$keagamaan->gambar1}}" height="250px" class="card-img-top mb-4" alt="...">
        <img src="/upload/keagamaan/{{$keagamaan->gambar2}}" height="250px" class="card-img-top mb-4" alt="...">
        <img src="/upload/keagamaan/{{$keagamaan->gambar3}}" height="250px" class="card-img-top mb-4" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$keagamaan->title}}</h2>
            <h4 class="card-title">{{$keagamaan->subtitle}}</h4>
            <p class="card-text">{!!$keagamaan->konten!!}</p>
            <p class="card-text"><small class="text-muted">{{$keagamaan->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection