@extends('sb-admin/app')
@section('title', 'Team')
@section('team', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/team/{{$team->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/team" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/team/{{$team->gambar}}" height="350px" class="card-img-top mb-4" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$team->nama_anggota}}</h2>
            <h3 class="card-title">{{$team->posisi}}</h3>
            <p class="card-text">{!!$team->quotes!!}</p>
            <p class="card-text"><small class="text-muted">{{$team->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection