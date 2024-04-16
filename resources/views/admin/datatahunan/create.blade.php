@extends('sb-admin/app')
@section('title', 'Data Tahunan')
@section('Data Tahunan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Tahunan</h1>

    <form action="/datatahunan" method="POST">
        @csrf
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun">
            @error('tahun')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama_data1">Nama Data 1</label>
            <input type="text" class="form-control" id="nama_data1" name="nama_data1">
            @error('nama_data1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama_data2">Nama Data 2</label>
            <input type="text" class="form-control" id="nama_data2" name="nama_data2">
            @error('nama_data2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama_data3">Nama Data 1</label>
            <input type="text" class="form-control" id="nama_data3" name="nama_data3">
            @error('nama_data3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_data1">Total Data 1</label>
            <input type="number" class="form-control" id="total_data1" name="total_data1">
            @error('total_data1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_data2">Total Data 2</label>
            <input type="number" class="form-control" id="total_data2" name="total_data2">
            @error('total_data2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_data3">Total Data 3</label>
            <input type="number" class="form-control" id="total_data3" name="total_data3">
            @error('total_data3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon1">Icon 1</label>
            <input type="text" class="form-control" id="icon1" name="icon1">
            @error('icon1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon2">Icon 2</label>
            <input type="text" class="form-control" id="icon2" name="icon2">
            @error('icon2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon3">Icon 3</label>
            <input type="text" class="form-control" id="icon3" name="icon3">
            @error('icon3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/datatahunan" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection