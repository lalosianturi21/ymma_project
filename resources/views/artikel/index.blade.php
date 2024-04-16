@extends('artikel/template/app')


@isset($tag_dipilih)
     @section('title')
        Tag : {{$tag_dipilih->nama}}
    @endsection
@endisset

@isset($kategori_dipilih)
    @section('title')
        Kategori : {{$kategori_dipilih->nama}}
    @endsection
    @section('kategori', 'active')
@endisset

@isset($author_dipilih)
    @section('title')
        Author : {{$author_dipilih->name}}
    @endsection
    @section('author', 'active')
@endisset

@isset($home)
    @section('title', 'Berita Yayasan Mentari Meraki Asa Sumatera Utara')
    @section('home', 'active')
@endisset

@section('content')
   @isset($banner)
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            
            <div class="carousel-inner">
                @foreach ($banner as $row)
                    <div class="carousel-item {{($loop->first) ? 'active' : ''}}">
                        <a href="/artikel-banner/{{$row->slug}}"><img src="/upload/banner/{{$row->sampul}}"  class="d-block w-100 img-size" alt="..."></a>
                        <div class="carousel-caption ">
                            <h3 class="mb-3">{{$row->judul}}</h3>
							<div class="box-konten">
                            <p>{!!$row->konten!!}</p>
							</div>
                            <!-- <a href="#" class="button btn-call ">Hubungi sekarang  <ion-icon name="logo-whatsapp" class="icon-size"></ion-icon></a> -->
                        </div>
                    </div>
                @endforeach
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
   @endisset



<!-- Start Schedule Area -->
<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first" style="background-image: url('/upload/assets/seputar.jpeg'); background-size: cover; ">
								<div class="inner">
									<div class="single-content" >
										<div class="content-title">
										<h4>Seputar TB</h4>
										</div>
										<div class="learn mt-5" >
										<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first" style="background-image: url('/upload/assets/toss.jpg'); background-size: cover; ">
								<div class="inner">
									<div class="single-content" >
										<div class="content-title">
										<h4>TOSS TB</h4>
										</div>
										<div class="learn mt-5" >
										<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first" style="background-image: url('/upload/assets/penyintas.jpg'); background-size: cover; ">
								<div class="inner">
									<div class="single-content" >
										<div class="content-title">
										<h4>Penyintas TB</h4>
										</div>
										<div class="learn mt-5" >
										<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>

		

		@isset($program)
        <!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>{{$program->heading}}</h2>
							<img src="/upload/assets/section-img.png" alt="#">
							<p>{{$program->sub_heading}}</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
                            <i class="{{$program->icon_program1}}"></i>
							</div>
							<h3>{{$program->title1}}</h3>
							<p>{{$program->subtitle1}}</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
                            <i class="{{$program->icon_program2}}"></i>
							</div>
							<h3>{{$program->title2}}</h3>
							<p>{{$program->subtitle2}}</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features last">
							<div class="signle-icon">
                            <i class="{{$program->icon_program3}}"></i>
							</div>
							<h3>{{$program->title3}}</h3>
							<p>{{$program->subtitle3}}</p>
						</div>
						<!-- End Single features -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->
		@endisset

		@isset($datatahunan)
		<div class="slider">
		@foreach ($datatahunan as $row)
		<!-- tahun 2021 -->
        <div id="fun-facts" class="fun-facts section overlays">
			<div class="container">
			<h2 class="text-center text-header">Data Tahun {{$row->tahun}}</h2>
				<div class="row card-position">
					<div class="col-lg-4 col-md-6">
						<div class="single-fun">
						<i class="{{ $row->icon1 }}"></i>
						<div class="content">
							<span class="counter">{{$row->total_data1}}</span>
							<p>{{$row->nama_data1}}</p>
						</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-fun">
						<i class="{{ $row->icon2 }}"></i>
						<div class="content">
							<span class="counter">{{$row->total_data2}}</span>
							<p>{{$row->nama_data2}}</p>
						</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<div class="single-fun">
						<i class="{{ $row->icon3 }}"></i>
						<div class="content">
							<span class="counter">{{$row->total_data3}}</span>
							<p>{{$row->nama_data3}}</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		</div>
		@endisset



		@isset($profile)
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
		@endisset

		@isset($content)
<!-- Start Call to action -->
<section class="call-action overlays" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>{{$content->title}}</h2>
							<p>{{$content->sub_title}}</p>
							<div class="button">
								<a href="{{$content->link_button}}" class="btn">{{$content->nama_button}}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->
		@endisset

		@isset($team)
		<!-- Start portfolio -->
		<section class="portfolio section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Tim Yayasan Mentari Meraki Asa Sumatera Utara</h2>
							<img src="/upload/assets/section-img.png" alt="#">
							<p>Tim Yayasan Mentari Meraki Asa Sumatera Utara, bertekad untuk menginspirasi 
								dan membawa perubahan positif bagi masyarakat.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="owl-carousel portfolio-slider">
						@foreach ($team as $row)
							<div class="single-pf">
								<img src="/upload/team/{{$row->gambar}}" alt="#">
								<a href="/artikel-team/{{$row->slug}}" class="btn">View Details</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End portfolio -->
		@endisset
		

		@isset($mitra)
		<!-- Start clients -->
		<div class="clients overlays">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="owl-carousel clients-slider">
						@foreach ($mitra as $row)
							<div class="single-clients">
								<img src="/upload/mitra/{{$row->gambar}}" alt="{{$row->nama_mitra}}">
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Ens clients -->
		@endisset


		
		<!-- Start Blog Area -->
		<div class="blog section" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>@yield('title')</h2>
							<img src="/upload/assets/section-img.png" alt="#">
							<p>Yayasan mentari meraki asa telah banyak mengikuti beberapa kegiatan dan bermitra  untuk membahas penanganan tuberkulosis</p>
						</div>
					</div>
				</div>
				<div class="row">
				@foreach ($artikel as $row)
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news mb-5">
							<div class="news-head">
							<a href="/{{ $row->slug }}"><img src="/upload/post/{{$row->sampul}}" alt="#"></a>
							</div>
							<div class="news-body">
								<div class="news-content">
									<div class="date">{{$row->created_at->format('d F Y')}}</div>
									<h2><a href="/{{ $row->slug }}">{{$row->judul}}</a></h2>
									<p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod tempor incididunt sed do incididunt sed.</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- End Blog Area -->

		<section class="why-choose " >
			<div class="container">
				
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>Contact Us</h3>
							<h4 class="mb-4">
							Organizers Secretariat
							</h4>
							<p class="mb-4">Jalan Karya Tani Gg.Makmur Kec .Medan Johor Sumatera Utara</p>
							<h4 class="mb-4">
							Contact Person
							</h4>
							<p class="mb-4"><i class="fa-solid fa-check-double mr-2"></i>Admin YMMA +62359353939</p>
							
						</div>
						<!-- End Choose Left -->
						
					</div>
				</div>
			</div>
			<div class="container ">
			<div class="googlemap">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.642772792119!2d119.45000907489676!3d-5.161042094816289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee356565b3ba5%3A0xb8bbbc8094a4a9cb!2sYamali%20TB!5e0!3m2!1sid!2sid!4v1698936517109!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="google-iframe"></iframe>
			</div>
		</div>
		</section>
		
		


		<!--/ End Why choose -->
    <!-- @isset($rekomendasi)
        @if ($rekomendasi->isNotEmpty())
        <div class="container">
            <h2 class="my-4 text-center">Rekomendasi</h2>

            <div class="row mt-4">
                @foreach ($rekomendasi as $row)
                        <div class="col-md-4 mt-5">
                            <div class="card shadow-sm">
                                <a href="/{{$row->post->slug}}"><img src="/upload/post/{{$row->post->sampul}}" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$row->post->judul}}</h5>
                                    <p class="card-text"><small class="text-muted">{{$row->post->created_at->diffForHumans()}}</small></p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">{{$rekomendasi->links()}}</div>
        @endif
    @endisset

    <h2 class="my-4 text-center">@yield('title')</h2>

    <div class="d-flex justify-content-center">
        <form class="form-inline my-2 my-lg-0" method="GET" action="{{url()->full()}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search For ..." aria-label="Search" name="search" value="{{$search}}">
            <button class="btn btn-primary my-2 my-sm-0 mx-auto" type="submit">Search</button>
        </form>
    </div>

    @if (session('search'))
        <div class="row mt-4 justify-content-center text-center">
            <div class="col-md-6">
                <div class="alert alert-info" role="alert">
                {{session('search')}}
                </div>
            </div>
        </div>
    @else
        <div class="row mt-4">
            @foreach ($artikel as $row)
                    <div class="col-md-4 mt-5">
                        <div class="card shadow-sm">
                            <a href="/{{$row->slug}}"><img src="/upload/post/{{$row->sampul}}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">{{$row->judul}}</h5>
                                <p class="card-text"><small class="text-muted">{{$row->created_at->diffForHumans()}}</small></p>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">{{$artikel->links()}}</div>
        </div>
        @endif -->
   
@endsection






