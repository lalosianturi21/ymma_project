<!doctype html>
<html lang="en">
{{-- head --}}
    @include('sb-admin/head')

  <body id="page-top">
    {{-- navbar --}}

    <div class="splash-screen">
    <div class="loadercont">
    <div class="loaderin">
        <div class="loader1"></div>
        <div class="loader2"></div>
        <div class="loader3"></div>
        <div class="loader4"></div>
        <div class="loader5"></div>
        <div class="loader6"></div>
    </div>
</div>
    </div>

    @include('artikel/template/navbar')

    <div class="mx-auto" >
        @yield('content')
    </div>

    <!-- Footer -->
      @include('sb-admin/footer')

    <!-- Scroll to Top Button-->
    @include('sb-admin/button-topbar')

   {{-- logout --}}
   @include('sb-admin/logout-modal')
  
   {{-- javascript --}}
   @include('sb-admin/javascript')
  </body>
 

</html>