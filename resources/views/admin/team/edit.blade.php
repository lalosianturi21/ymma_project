@extends('sb-admin/app')
@section('title', 'Team')
@section('team', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Team</h1>

    <form action="/team/{{$team->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama_anggota">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{old('nama_anggota') ? old('nama_anggota') : $team->nama_anggota}}">
            @error('nama_anggota')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="posisi">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{old('posisi') ? old('posisi') : $team->posisi}}">
            @error('posisi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Quotes</label>
            <textarea class="form-control" id="editor" rows="10" name="quotes">{{old('quotes') ? old('quotes') : $team->quotes}}</textarea>
            @error('quotes')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <img src="/upload/team/{{$team->gambar}}" width="100%" height="150px" class="mt-2" alt="">
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
        <a href="/team" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection