<!-- Bootstrap core JavaScript-->
  <script src="/vendor/sb-admin/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://kit.fontawesome.com/a2331dbcf7.js" crossorigin="anonymous"></script>

  <!-- Custom scripts for all pages-->
  <script src="/vendor/sb-admin/js/sb-admin-2.min.js"></script>
  <script src="{{ asset('js/main.js') }}" >
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script>
   
  /*===============================
			Portfolio Slider JS
		=================================*/ 
		$('.portfolio-slider').owlCarousel({
			autoplay:true,
			autoplayTimeout:4000,
			margin:15,
			smartSpeed:300,
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					items:4,
				},
			}
		});
      /*===============================
			Clients Slider JS
		=================================*/ 
		$('.clients-slider').owlCarousel({
			items:5,
			autoplay:true,
			autoplayTimeout:3500,
			margin:15,
			smartSpeed: 400,
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:3,
				},
				1170: {
					items:5,
				},
			}
		});
		
</script>

    

