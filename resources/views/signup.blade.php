@extends('layouts.master')
@section('content')
<div class="container">
        <div id="content">
            <form action="#" method="post" class="beta-form-checkout">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" id="your_last_name" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" id="adress" value="Street Address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="text" id="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="text" id="phone" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->

    @endsection


    <!-- include js files -->
    <script src="assets/dest/js/jquery.js"></script>
    <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="assets/dest/vendors/animo/Animo.js"></script>
    <script src="assets/dest/vendors/dug/dug.js"></script>
    <script src="assets/dest/js/scripts.min.js"></script>
    <!--customjs-->
    <script type="text/javascript">
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $(".main-menu a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest("li").addClass("active");
                    $(this).parents('li').addClass('parent-active');
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            'use strict';

            // color box

            //color
            jQuery('#style-selector').animate({
                left: '-213px'
            });

            jQuery('#style-selector a.close').click(function(e) {
                e.preventDefault();
                var div = jQuery('#style-selector');
                if (div.css('left') === '-213px') {
                    jQuery('#style-selector').animate({
                        left: '0'
                    });
                    jQuery(this).removeClass('icon-angle-left');
                    jQuery(this).addClass('icon-angle-right');
                } else {
                    jQuery('#style-selector').animate({
                        left: '-213px'
                    });
                    jQuery(this).removeClass('icon-angle-right');
                    jQuery(this).addClass('icon-angle-left');
                }
            });
        });
    </script>
</body>

</html>