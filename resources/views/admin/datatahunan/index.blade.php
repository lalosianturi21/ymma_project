@extends('sb-admin/app')
@section('title', 'Data Tahunan')
@section('datatahunan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Tahunan</h1>

    <a href="/datatahunan/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Tahunan</a>

    @if ($datatahunan[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Nama Data 1</th>
                <th scope="col">Nama Data 2</th>
                <th scope="col">Nama Data 3</th>
                <th scope="col">Total Data 1</th>
                <th scope="col">Total Data 2</th>
                <th scope="col">Total Data 3</th>
                <th scope="col">Icon 1</th>
                <th scope="col">Icon 2</th>
                <th scope="col">Icon 3</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datatahunan as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->tahun}}</td>
                    <td>{{$row->nama_data1}}</td>
                    <td>{{$row->nama_data2}}</td>
                    <td>{{$row->nama_data3}}</td>
                    <td>{{$row->total_data1}}</td>
                    <td>{{$row->total_data2}}</td>
                    <td>{{$row->total_data3}}</td>
                    <td>{{$row->icon1}}</td>
                    <td>{{$row->icon2}}</td>
                    <td>{{$row->icon3}}</td>
                    <td>{{$row->slug}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/datatahunan/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/datatahunan/{{$row->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        {{$datatahunan->links()}}
    @else
        @if (session('search'))
             {!! session('search') !!}
       @else
            <div class="alert alert-info mt-4" role="alert">
                Anda belum mempunyai data
            </div>
       @endif
    @endif
@endsection

@section('search-url', '/datatahunan/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection