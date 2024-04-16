@extends('artikel/template/app')
@section('title', 'Profile')

@section('content')

<div class="breadcrumbs overlays">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Profile</h2>
							<ul class="bread-list">
								<li><a href="/">Beranda</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Profile</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

<!-- Start Why choose -->
<section class="why-choose section" id="profile" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2> {{ $profile->heading }}</h2>
							<img src="/upload/assets/section-img.png" alt="#">
							<p>{{ $profile->sub_heading }}</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>{{ $profile->nama }}</h3>
							<p>{!! $profile->description1 !!}</p>
							<p>{!! $profile->description2 !!}
							</p>
							<div class="row">
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>{{ $profile->program1 }}</li>
										<li><i class="fa fa-caret-right"></i>{{ $profile->program2 }}</li>
										<li><i class="fa fa-caret-right"></i>{{ $profile->program3 }}</li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>{{ $profile->program4 }}</li>
										<li><i class="fa fa-caret-right"></i>{{ $profile->program5 }}</li>
										<li><i class="fa fa-caret-right"></i>{{ $profile->program6 }}</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
								<!-- Video Animation -->
								<div class="promo-video">
									<div class="waves-block">
										<div class="waves wave-1"></div>
										<div class="waves wave-2"></div>
										<div class="waves wave-3"></div>
									</div>
								</div>
								<!--/ End Video Animation -->
								<a href="{{ $profile->link_yt }}" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->

@endsection