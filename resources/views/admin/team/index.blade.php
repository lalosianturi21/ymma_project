@extends('sb-admin/app')
@section('title', 'Team')
@section('team', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Team</h1>

    <a href="/team/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Team</a>

   @if ($team[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Posisi</th>
                <th scope="col">Quotes</th>
                <th scope="col">Gambar</th>
                <th scope="col">Slug</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nama_anggota}}</td>
                    <td>{{$row->posisi}}</td>
                    <td>{{$row->quotes}}</td>
                    <td><img src="/upload/team/{{$row->gambar}}" alt="" width="80px" height="80px"></td>
                    <td>{{$row->slug}}</td>
                    <td width="25%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/team/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/team/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/team/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

        {{$team->links()}}
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

@section('search-url', '/team/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
    @include('admin/navbar-mobile')
@endsection