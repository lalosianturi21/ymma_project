@extends('sb-admin/app')
@section('title', 'Mitra')
@section('mitra', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/mitra/{{$mitra->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/mitra" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/mitra/{{$mitra->gambar}}" height="350px" class="card-img-top mb-4" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$mitra->nama_mitra}}</h2>
            <p class="card-text"><small class="text-muted">{{$mitra->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection