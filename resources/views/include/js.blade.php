  <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
  <script src="{{asset('library/MD-shop/js/vendor/jquery-2.1.4.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/bootstrap.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/smoothscroll.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/velocity.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/waves.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/icheck.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/owl.carousel.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/jquery.downCount.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/vendor/magnific-popup.min.js')}}"></script>
  <script src="{{asset('library/MD-shop/js/scripts.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{asset('dist/js/lightbox.js')}}">
  
  </script>
  <script src="{{asset('js/app.js')}}"></script>


  {{-- Toastr  --}}
  @if(Session::has('message'));
  <script>
      @if(Session::has('toastnew'))
      toastr.options.positionClass = "{{Session::get('toastnew')}}";
      @else
      toastr.options.positionClass = "{{$toastr}}";
      @endif
      toastr.success("{{Session::get('message')}}");

  </script>
  @endif
