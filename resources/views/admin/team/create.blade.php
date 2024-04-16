@extends('sb-admin/app')
@section('title', 'Team')
@section('team', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Team</h1>

    <form action="/team" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_anggota">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{old('nama_anggota')}}">
            @error('nama_anggota')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="posisi">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{old('posisi')}}">
            @error('posisi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Quotes</label>
            <textarea class="form-control" id="editor" rows="10" name="quotes">{{old('quotes')}}</textarea>
            @error('quotes')
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
        <a href="/team" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection