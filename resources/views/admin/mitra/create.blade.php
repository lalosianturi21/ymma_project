@extends('sb-admin/app')
@section('title', 'Mitra')
@section('mitra', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mitra</h1>

    <form action="/mitra" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_mitra">Nama Mitra</label>
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="{{old('nama_mitra')}}">
            @error('nama_mitra')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @error('gambar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/mitra" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

