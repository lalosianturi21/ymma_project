@extends('sb-admin/app')
@section('title', 'Kemanusiaan')
@section('kemanusiaan', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kemanusiaan</h1>

    <a href="/kemanusiaan/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kemanusiaan</a>

   @if ($kemanusiaan[0])
        {{-- table --}}
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Gambar 1</th>
                <th scope="col">Gambar 2</th>
                <th scope="col">Gambar 3</th>
                <th scope="col">Konten</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kemanusiaan as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->title}}</td>
                    <td>{{$row->subtitle}}</td>
                    <td><img src="/upload/kemanusiaan/{{$row->gambar1}}" alt="" width="80px" height="80px"></td>
                    <td><img src="/upload/kemanusiaan/{{$row->gambar2}}" alt="" width="80px" height="80px"></td>
                    <td><img src="/upload/kemanusiaan/{{$row->gambar3}}" alt="" width="80px" height="80px"></td>
                    <td>{!!$row->konten!!}</td>
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/kemanusiaan/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/kemanusiaan/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/kemanusiaan/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$kemanusiaan->links()}}
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

@section('search-url', '/kemanusiaan/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection