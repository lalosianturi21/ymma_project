@extends('sb-admin/app')
@section('title', 'konten')
@section('konten', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Content</h1>

    <a href="/content/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Content</a>

   @if ($content[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Nama Button</th>
                <th scope="col">Link Button</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->title}}</td>
                    <td>{{$row->sub_title}}</td>
                    <td>{{$row->nama_button}}</td>
                    <td>{{$row->link_button}}</td>
                    <td>{{$row->slug}}</td>
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/content/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/content/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        {{$content->links()}}
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

@section('search-url', '/content/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection