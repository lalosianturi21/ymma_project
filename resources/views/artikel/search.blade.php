@extends('artikel/template/app')
@section('title', 'Search')

@section('content')
@if ($query === null || $query === '')
    <p>Data tidak ditemukan</p>
@elseif ($artikel->isEmpty())
    <p>Data tidak ditemukan</p>
@else
    @foreach ($artikel as $art)
       <a href="/{{ $art->slug }}"> <p>{{ $art->judul }}</p></a>
        <!-- Tambahkan konten lainnya sesuai kebutuhan -->
    @endforeach
@endif
@endsection
