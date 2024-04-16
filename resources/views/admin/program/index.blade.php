@extends('sb-admin/app')
@section('title', 'Program')
@section('program', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Program</h1>

    <a href="/program/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Program</a>

   @if ($program[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Heading</th>
                <th scope="col">Sub Heading</th>
                <th scope="col">Title 1</th>
                <th scope="col">Title 2</th>
                <th scope="col">Title 3</th>
                <th scope="col">Sub Title 1</th>
                <th scope="col">Sub Title 2</th>
                <th scope="col">Sub Title 3</th>
                <th scope="col">Icon 1</th>
                <th scope="col">Icon 2</th>
                <th scope="col">Icon 3</th>
                <th scope="col">Slug</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($program as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->heading}}</td>
                    <td>{{$row->sub_heading}}</td>
                    <td>{{$row->title1}}</td>
                    <td>{{$row->title2}}</td>
                    <td>{{$row->title3}}</td>
                    <td>{{$row->subtitle1}}</td>
                    <td>{{$row->subtitle2}}</td>
                    <td>{{$row->subtitle3}}</td>
                    <td>{{$row->icon_program1}}</td>
                    <td>{{$row->icon_program2}}</td>
                    <td>{{$row->icon_program3}}</td>
                    <td>{{$row->slug}}</td>
                    <td width="25%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/program/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/program/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/program/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

        {{$program->links()}}
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

@section('search-url', '/program/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
    @include('admin/navbar-mobile')
@endsection