<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © <script>document.write(new Date().getFullYear())</script> Shapla City Limited <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-success"></i> Excel IT AI.</span>
            </div>
        </div>
    </div>
</footer>

{{-- </div> --}}
<!-- end main content-->

</body>





    <!-- JAVASCRIPT -->
                <script src="{{asset('assets')}}/libs/jquery/jquery.min.js"></script>
                <script src="{{asset('assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="{{asset('assets')}}/libs/simplebar/simplebar.min.js"></script>
                <script src="{{asset('assets')}}/libs/node-waves/waves.min.js"></script>

                {{-- <script src="{{asset('assets')}}/libs/metismenu/metisMenu.min.js"></script> --}}


        <!-- Peity chart-->
        <script src="{{asset('assets')}}/libs/peity/jquery.peity.min.js"></script>
        <!-- Plugin Js-->
        <script src="{{asset('assets')}}/libs/chartist/chartist.min.js"></script>
        <script src="{{asset('assets')}}/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

        <script src="{{asset('assets')}}/libs/metismenu/metisMenu.min.js"></script>


        <script src="{{asset('assets')}}/js/pages/dashboard.init.js"></script>

        <script src="{{asset('assets')}}/js/app.js"></script>
        <!-- Essential script-->
        @yield('script')
        <script src="{{asset('assets')}}/js/custom.js"></script>
        <script src="{{asset('assets')}}/js/myScript.js"></script>


    </body>

</html>
