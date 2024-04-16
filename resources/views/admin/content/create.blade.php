@extends('sb-admin/app')
@section('title', 'Konten')
@section('konten', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Content</h1>

    <form action="/content" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub_title">Sub Title</label>
            <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{old('sub_title')}}">
            @error('sub_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama_button">Nama Button</label>
            <input type="text" class="form-control" id="nama_button" name="nama_button" value="{{old('nama_button')}}">
            @error('nama_button')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="link_button">Link Button</label>
            <input type="text" class="form-control" id="link_button" name="link_button" value="{{old('link_button')}}">
            @error('link_button')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/content" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

