@extends('sb-admin/app')
@section('title', 'Program')
@section('program', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/program/{{$program->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/program" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title">{{$program->heading}}</h2>
            <h2 class="card-title">{{$program->sub_heading}}</h2>
            <h3 class="card-title">{{$program->title1}}</h3>
            <h3 class="card-title">{{$program->title2}}</h3>
            <h3 class="card-title">{{$program->title3}}</h3>
            <h3 class="card-title">{{$program->subtitle1}}</h3>
            <h3 class="card-title">{{$program->subtitle2}}</h3>
            <h3 class="card-title">{{$program->subtitle3}}</h3>
            <h3 class="card-title">{{$program->icon_program1}}</h3>
            <h3 class="card-title">{{$program->icon_program2}}</h3>
            <h3 class="card-title">{{$program->icon_program3}}</h3>
            <p class="card-text"><small class="text-muted">{{$program->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection