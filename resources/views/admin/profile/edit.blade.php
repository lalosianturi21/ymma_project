@extends('sb-admin/app')
@section('title', 'Profile')
@section('profile', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <form action="/profile/{{$profile->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{old('heading') ? old('heading') : $profile->heading}}">
            @error('heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub_heading">Sub Heading</label>
            <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="{{old('sub_heading') ? old('sub_heading') : $profile->sub_heading}}">
            @error('sub_heading')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') ? old('nama') : $profile->nama}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program1">Program 1</label>
            <input type="text" class="form-control" id="program1" name="program1" value="{{old('program1') ? old('program1') : $profile->program1}}">
            @error('program1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program2">Program 2</label>
            <input type="text" class="form-control" id="program2" name="program2" value="{{old('program2') ? old('program2') : $profile->program2}}">
            @error('program2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program3">Program 3</label>
            <input type="text" class="form-control" id="program3" name="program3" value="{{old('program3') ? old('program3') : $profile->program3}}">
            @error('program3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program4">Program 4</label>
            <input type="text" class="form-control" id="program4" name="program4" value="{{old('program4') ? old('program4') : $profile->program4}}">
            @error('program4')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program5">Program 5</label>
            <input type="text" class="form-control" id="program5" name="program5" value="{{old('program5') ? old('program5') : $profile->program5}}">
            @error('program5')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="program6">Program 6</label>
            <input type="text" class="form-control" id="program6" name="program6" value="{{old('program6') ? old('program6') : $profile->program6}}">
            @error('program6')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="link_yt">Link Youtube</label>
            <input type="text" class="form-control" id="link_yt" name="link_yt" value="{{old('link_yt') ? old('link_yt') : $profile->link_yt}}">
            @error('link_yt')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Description 1</label>
            <textarea class="form-control" id="editor" rows="10" name="description1">{{old('description1') ? old('description1') : $profile->description1}}</textarea>
            @error('description1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Description 2</label>
            <textarea class="form-control" id="editor" rows="10" name="description2">{{old('description2') ? old('description2') : $profile->description2}}</textarea>
            @error('description2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/profile" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection