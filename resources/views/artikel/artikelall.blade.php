@extends('artikel/template/app')
@section('title', 'Artikel')
@section('artikel', 'active')

@section('content')
<div class="section-title-fp  hytext text-center mt-5">
            <h4>KEGIATAN</h4>
        </div>
<div class="row">
@foreach($artikelall as $artikel)
    <div class="col-md-3 mt-4">
        <div class="card shadow-sm shadow-lg p-3 mb-5 bg-white rounded">
            <a href="/{{ $row->slug }}"><img src="/upload/post/{{$artikel->sampul}}" class="card-img-top image-card shadow-sm shadow-lg p-3" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">{{$artikel->judul}}</h5>
                <p class="card-text"><small class="text-muted"><i class="fa-solid fa-calendar-days"></i>  {{$artikel->created_at->diffForHumans()}}</small></p>
            </div>
        </div>
    </div>
@endforeach


</div>
<div class="d-flex justify-content-center">
    {{ $artikelall->links() }}
</div>
@endsection
