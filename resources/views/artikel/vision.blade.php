@extends('artikel/template/app')
@section('title', 'Visi dan Misi')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlays">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Visi & Misi</h2>
							<ul class="bread-list">
								<li><a href="/">Beranda</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Visi & Misi</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		 <!-- About Start -->
		 <div class="container-xxl vision ">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="/upload/banner/{{$banner2->sampul}}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="/upload/banner/{{$banner1->sampul}}" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn text-vision" data-wow-delay="0.5s">
                    <h1 class="mb-4">{{$banner2->judul}}</h1>
                    <p>{{$banner2->konten}}</p>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

	 <!-- Feature Start -->
	 <div class="container-xxl overflow-hidden mission px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0 text-mission">
                     
                        <h1 class="mb-4">{{$banner3->judul}}</h1>
                        <p class="mb-4 pb-2">{{$banner3->konten}}</p>
                        <div class="row g-4">
                           
                            
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="/upload/banner/{{$banner3->sampul}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


@endsection