@extends('sb-admin/app')
@section('title', 'Mitra')
@section('mitra', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mitra</h1>

    <form action="/mitra/{{$mitra->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama_mitra">Nama Mitra</label>
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="{{old('nama_mitra') ? old('nama_mitra') : $mitra->nama_mitra}}">
            @error('nama_mitra')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <img src="/upload/mitra/{{$mitra->gambar}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="gambar">gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/mitra" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection