@extends('sb-admin/app')
@section('title', 'Profile')
@section('profile', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <a href="/profile/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Profile</a>

   @if ($profile[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Heading</th>
                <th scope="col">Sub Heading</th>
                <th scope="col">Nama</th>
                <th scope="col">Description 1</th>
                <th scope="col">Description 2</th>
                <th scope="col">Program 1</th>
                <th scope="col">Program 2</th>
                <th scope="col">Program 3</th>
                <th scope="col">Program 4</th>
                <th scope="col">Program 5</th>
                <th scope="col">Program 6</th>
                <th scope="col">Link YT</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profile as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->heading}}</td>
                    <td>{{$row->sub_heading}}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->description1}}</td>
                    <td>{{$row->description2}}</td>
                    <td>{{$row->program1}}</td>
                    <td>{{$row->program2}}</td>
                    <td>{{$row->program3}}</td>
                    <td>{{$row->program4}}</td>
                    <td>{{$row->program5}}</td>
                    <td>{{$row->program6}}</td>
                    <td>{{$row->link_yt}}</td>
                    <td>{{$row->slug}}</td>
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/profile/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/profile/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/profile/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        {{$profile->links()}}
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

@section('search-url', '/profile/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection