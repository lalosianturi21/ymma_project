@extends('sb-admin/app')
@section('title', 'Profile')
@section('profile', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/profile/{{$profile->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/profile" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title">{{$profile->heading}}</h2>
            <p class="card-text"><span class="mb-2">Sub Heading : </span>{{$profile->sub_heading}}</p>
            <p class="card-text"><span class="mb-2">Nama : </span>{{$profile->nama}}</p>
            <p class="card-text"><span class="mb-2">Description 1 : </span>{!!$profile->description1!!}</p>
            <p class="card-text"><span class="mb-2">Description 2 : </span>{!!$profile->description2!!}</p>
            <p class="card-text"><span class="mb-2">Program 1 : </span>{{$profile->program1}}</p>
            <p class="card-text"><span class="mb-2">Program 2 : </span>{{$profile->program2}}</p>
            <p class="card-text"><span class="mb-2">Program 3 : </span>{{$profile->program3}}</p>
            <p class="card-text"><span class="mb-2">Program 4 : </span>{{$profile->program4}}</p>
            <p class="card-text"><span class="mb-2">Program 5 : </span>{{$profile->program5}}</p>
            <p class="card-text"><span class="mb-2">Program 6 : </span>{{$profile->program6}}</p>
            <p class="card-text"><span class="mb-2">Link Youtube : </span>{{$profile->link_yt}}</p>
            <p class="card-text"><small class="text-muted">{{$profile->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection