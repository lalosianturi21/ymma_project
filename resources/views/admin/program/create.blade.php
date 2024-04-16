@extends('sb-admin/app')
@section('title', 'Program')
@section('program', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Program</h1>

    <form action="/program" method="post" enctype="multipart/form-data">
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
            <label for="title1">Title 1</label>
            <input type="text" class="form-control" id="title1" name="title1" value="{{old('title1')}}">
            @error('title1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="title2">Title 2</label>
            <input type="text" class="form-control" id="title2" name="title2" value="{{old('title2')}}">
            @error('title2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="title3">Title 3</label>
            <input type="text" class="form-control" id="title3" name="title3" value="{{old('title3')}}">
            @error('title3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle1">Sub Title 1</label>
            <input type="text" class="form-control" id="subtitle1" name="subtitle1" value="{{old('subtitle1')}}">
            @error('subtitle1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle2">Sub Title 2</label>
            <input type="text" class="form-control" id="subtitle2" name="subtitle2" value="{{old('subtitle2')}}">
            @error('subtitle2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="subtitle3">Sub Title 3</label>
            <input type="text" class="form-control" id="subtitle3" name="subtitle3" value="{{old('subtitle3')}}">
            @error('subtitle3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program1">Icon Program 1</label>
            <input type="text" class="form-control" id="icon_program1" name="icon_program1" value="{{old('icon_program1')}}">
            @error('icon_program1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program2">Icon Program 2</label>
            <input type="text" class="form-control" id="icon_program2" name="icon_program2" value="{{old('icon_program2')}}">
            @error('icon_program2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon_program3">Icon Program 3</label>
            <input type="text" class="form-control" id="icon_program3" name="icon_program3" value="{{old('icon_program3')}}">
            @error('icon_program3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/program" class="btn btn-secondary btn-sm">Kembali</a>
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