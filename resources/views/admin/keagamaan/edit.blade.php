@extends('sb-admin/app')
@section('title', 'Keagamaan')
@section('keagamaan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Keagamaan</h1>

    <form action="/keagamaan/{{$keagamaan->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $keagamaan->title}}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle">Sub Title</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{old('subtitle') ? old('subtitle') : $keagamaan->subtitle}}">
            @error('subtitle')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="/upload/keagamaan/{{$keagamaan->gambar1}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-2">
                <img src="/upload/keagamaan/{{$keagamaan->gambar2}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-2">
                <img src="/upload/keagamaan/{{$keagamaan->gambar3}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="gambar1">Gambar 1</label>
                    <input type="file" class="form-control" id="gambar1" name="gambar1">
                    @error('gambar1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar2">Gambar 2</label>
                    <input type="file" class="form-control" id="gambar2" name="gambar2">
                    @error('gambar2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar3">Gambar 3</label>
                    <input type="file" class="form-control" id="gambar3" name="gambar3">
                    @error('gambar3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control" id="editor" rows="10" name="konten">{{old('konten') ? old('konten') : $keagamaan->konten}}</textarea>
            @error('konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/keagamaan" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection