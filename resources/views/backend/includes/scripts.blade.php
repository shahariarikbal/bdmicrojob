

        {{-- jquery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



        {{-- <script src="{{ asset('backend') }}/vendor/jquery/jquery.min.js" type="d486c9335ed9b58c4049bfb6-text/javascript"></script> --}}
        <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="d486c9335ed9b58c4049bfb6-text/javascript"></script>

        <script src="{{ asset('backend') }}/vendor/jquery-easing/jquery.easing.min.js" type="d486c9335ed9b58c4049bfb6-text/javascript"></script>

        <script src="{{ asset('backend') }}/vendor/owl-carousel/owl.carousel.js" type="d486c9335ed9b58c4049bfb6-text/javascript"></script>




        {{-- toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script src="{{ asset('backend') }}/js/custom.js" type="d486c9335ed9b58c4049bfb6-text/javascript"></script>
        <script src="{{ asset('backend') }}/js/rocket-loader.min.js" data-cf-settings="d486c9335ed9b58c4049bfb6-|49" defer=""></script>
        <script
            defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
            integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
            data-cf-beacon='{"rayId":"6ead673c3964461f","version":"2021.12.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'
            crossorigin="anonymous"
        ></script>





    {{-- toastr --}}
    <script type="text/javascript">
    @if (Session::has('Success'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
       toastr.success('{{Session::get('Success')}}');
    @endif
    @if (Session::has('Error'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
       toastr.error('{{Session::get('Error')}}');
    @endif
    </script>

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

