@extends('layouts.master');
@section('banner')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ($producttypes as $producttype)
                                 <li><a href="#">{{$producttype->name}}</a></li>
                        @endforeach
                      
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        {{-- <div class="row" >
                            @foreach($products as $product)
                            <div class="col-sm-4" style="margin-bottom: 50px">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('product.detail', ['id' => $product['id']]) }}"><img src="/source/image/product/{{ $product['image'] }}" alt="" width="180px" height="180px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $product->name }}</p>
                                        @if( ($product->promotion_price)!=0)
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ number_format( $product->unit_price,0,",",",")}}</span>
                                            <span class="flash-sale">{{ number_format( $product->promotion_price,0,",",",")}}</span>
                                        </p>
                                        @else
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ number_format( $product->unit_price,0,",",",")}}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                        </div> --}}

                    </div>
                </div> <!-- .beta-products-list -->

                
            
               
            </div>
        </div> <!-- end section with sidebar and main content -->

    </div> <!-- .main-content -->
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
<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/dest/js/waypoints.min.js"></script>
<script src="assets/dest/js/wow.min.js"></script>
<!--customjs-->
<script src="assets/dest/js/custom2.js"></script>
<script>
    $(document).ready(function($) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 150) {
                $(".header-bottom").addClass('fixNav')
            } else {
                $(".header-bottom").removeClass('fixNav')
            }
        })
    })
</script>
</body>

</html>