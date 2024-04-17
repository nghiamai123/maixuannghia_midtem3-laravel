@extends('layouts.master');
@section('banner')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/banner1.jpg" data-src="/source/image/slide/banner1.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner1.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>
                        </li>
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/banner2.jpg" data-src="/source/image/slide/banner2.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner2.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/banner3.jpg" data-src="/source/image/slide/banner3.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner3.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>

                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/banner4.jpg" data-src="/source/image/slide/banner4.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/banner4.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>

@endsection
@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($products as $product)
                            @if(($product->new)==1)
                            <div class="col-sm-3" style="margin-bottom:50px">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('product.detail', ['id' => $product['id']]) }}">
                                            <img src="/source/image/product/{{ $product['image'] }}" alt="" width="180px" height="180px">
                                        </a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $product->name }}</p>
                                        @if($product->promotion_price==0)
                                        <span class="flash-sale">{{ number_format($product->unit_price) }} đồng</span>
                                        @else
                                        <span class="flash-del">{{ number_format($product->unit_price) }} đồng</span>
                                        <span class="flash-sale">{{ number_format($product->promotion_price) }} đồng</span>
                                        @endif
                                        @if($product->promotion_price!=0)
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('banhang.addtocart', $product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('product.detail', ['id' => $product['id']]) }}">
                                            Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>All Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($products as $product)
                            @if(($product->new)==1)
                            <div class="col-sm-3" style="margin-bottom: 50px">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('product.detail', ['id' => $product['id']]) }}">
                                            <img src="/source/image/product/{{ $product['image'] }}" alt="" width="180px" height="180px">
                                        </a>
                                    </div>
                                    <div class=" single-item-body">
                                        <p class="single-item-title">{{ $product->name }}</p>
                                        @if( ($product->promotion_price)!=0)
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ number_format( $product->unit_price,0,",",".")}}</span>
                                            <span class="flash-sale">{{ number_format( $product->promotion_price,0,",",".")}}</span>
                                        </p>
                                        @else
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ $product->unit_price }}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('product.detail', ['id' => $product['id']]) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="space40">&nbsp;</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection