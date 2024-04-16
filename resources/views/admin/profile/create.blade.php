@extends('sb-admin/app')
@section('title', 'Profile')
@section('profile', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <form action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{old('heading')}}">
            @error('heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub_heading">Sub Heading</label>
            <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="{{old('sub_heading')}}">
            @error('sub_heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program1">Program 1</label>
            <input type="text" class="form-control" id="program1" name="program1" value="{{old('program1')}}">
            @error('program1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program2">Program 2</label>
            <input type="text" class="form-control" id="program2" name="program2" value="{{old('program2')}}">
            @error('program2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program3">Program 3</label>
            <input type="text" class="form-control" id="program3" name="program3" value="{{old('program3')}}">
            @error('program3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program4">Program 4</label>
            <input type="text" class="form-control" id="program4" name="program4" value="{{old('program4')}}">
            @error('program4')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program5">Program 5</label>
            <input type="text" class="form-control" id="program5" name="program5" value="{{old('program5')}}">
            @error('program5')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program6">Program 6</label>
            <input type="text" class="form-control" id="program6" name="program6" value="{{old('program6')}}">
            @error('program6')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="link_yt">Link Youtube</label>
            <input type="text" class="form-control" id="link_yt" name="link_yt" value="{{old('link_yt')}}">
            @error('link_yt')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Description 1</label>
            <textarea class="form-control" id="editor" rows="10" name="description1">{{old('description1')}}</textarea>
            @error('description1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Description 2</label>
            <textarea class="form-control" id="editor" rows="10" name="description2">{{old('description2')}}</textarea>
            @error('description2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/profile" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection