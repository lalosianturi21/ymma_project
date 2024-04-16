@extends('sb-admin/app')
@section('title', 'Program')
@section('program', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Program</h1>

    <form action="/program/{{$program->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{old('heading') ? old('heading') : $program->heading}}">
            @error('heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub_heading">Sub Heading</label>
            <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="{{old('sub_heading') ? old('sub_heading') : $program->sub_heading}}">
            @error('sub_heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="title1">Title 1</label>
            <input type="text" class="form-control" id="title1" name="title1" value="{{old('title1') ? old('title1') : $program->title1}}">
            @error('title1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="title2">Title 2</label>
            <input type="text" class="form-control" id="title2" name="title2" value="{{old('title2') ? old('title2') : $program->title2}}">
            @error('title2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="title3">Title 3</label>
            <input type="text" class="form-control" id="title3" name="title3" value="{{old('title3') ? old('title3') : $program->title3}}">
            @error('title3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle1">Sub Title 1</label>
            <input type="text" class="form-control" id="subtitle1" name="subtitle1" value="{{old('subtitle1') ? old('subtitle1') : $program->subtitle1}}">
            @error('subtitle1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle2">Sub title 2</label>
            <input type="text" class="form-control" id="subtitle2" name="subtitle2" value="{{old('subtitle2') ? old('subtitle2') : $program->subtitle2}}">
            @error('subtitle2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle3">Sub title 3</label>
            <input type="text" class="form-control" id="subtitle3" name="subtitle3" value="{{old('subtitle3') ? old('subtitle3') : $program->subtitle3}}">
            @error('subtitle3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program1">Icon 1</label>
            <input type="text" class="form-control" id="icon_program1" name="icon_program1" value="{{old('icon_program1') ? old('icon_program1') : $program->icon_program1}}">
            @error('icon_program1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program2">Icon 2</label>
            <input type="text" class="form-control" id="icon_program2" name="icon_program2" value="{{old('icon_program2') ? old('icon_program2') : $program->icon_program2}}">
            @error('icon_program2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program3">Icon 3</label>
            <input type="text" class="form-control" id="icon_program3" name="icon_program3" value="{{old('icon_program3') ? old('icon_program3') : $program->icon_program3}}">
            @error('icon_program3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/program" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection