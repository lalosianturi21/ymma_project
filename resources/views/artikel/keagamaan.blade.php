@extends('artikel/template/app')
@section('title', 'Keagamaan')

@section('content')
<div class="breadcrumbs overlays">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Program {{$keagamaan->title}}</h2>
							<ul class="bread-list">
								<li><a href="/">Beranda</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Program {{$keagamaan->title}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

        	<!-- Start Portfolio Details Area -->
		<section class="pf-details section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="inner-content">
                        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            
            <div class="carousel-inner">
            <div class="carousel-item active">
                                <img src="/upload/keagamaan/{{$keagamaan->gambar1}}" class="d-block w-100 img-width" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/upload/keagamaan/{{$keagamaan->gambar2}}" class="d-block w-100 img-width" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/upload/keagamaan/{{$keagamaan->gambar3}}" class="d-block w-100 img-width" alt="...">
                            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
							
							<div class="body-text">
								<h3>Program {{$keagamaan->title}}</h3>
								<p>{{$keagamaan->subtitle}}</p>
                                <p>{!!$keagamaan->konten!!}</p>
								<div class="share">
									<h4>Share Now -</h4>
									<ul>
										<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Portfolio Details Area -->


@endsection