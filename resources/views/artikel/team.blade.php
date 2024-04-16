@extends('artikel/template/app')

@section('title', 'Team')


@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlays">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>{{$team->nama_anggota}}</h2>
							<ul class="bread-list">
								<li><a href="/">Beranda</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">{{$team->nama_anggota}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

<!-- <h2>{{$team->nama_anggota}}</h2>
<img src="/upload/team/{{$team->gambar}}" alt="#">
<h2>{{$team->posisi}}</h2>
<h2>{!!$team->quotes!!}</h2> -->

<!-- Start Contact Us -->
<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-6">
							<div class="contact-us-left">
								<!--Start Google-map -->
								<img src="/upload/team/{{$team->gambar}}" alt="#">

								<!-- <div id="myMap"></div> -->
								<!--/End Google-map -->
							</div>
						</div>
						<div class="col-lg-6">
							<div class="contact-us-form">
								<h2 class="mb-4">{{$team->nama_anggota}}</h2>
                                <div class="position-info mb-4">
                                    <h4 class="info-title">Posisi:</h4>
                                    <p class="info-detail">{{$team->posisi}}</p>
                                </div>
                                <div class="quote-info mb-4">
                                    <h4 class="info-title">Quotes:</h4>
                                    <p class="info-detail">{!!$team->quotes!!}</p>
                                </div>
							</div>
						</div>
					</div>
				</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Contact Us -->
		
        
@endsection