@extends('layouts.master');
@section('banner')
@endsection
@section('content')
@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endif
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">History booking</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>History booking</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead class="nav" >
                    <tr id="nav12322">
                        <th class="product-name">Name Customer</th>
                        <th class="product-price">Price</th>
                        <th class="product-status">Method payment</th>
                        <th class="product-status">Address</th>
                        <th class="product-quantity">Qty.</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Note</th>
                        <th class="product-remove">Day create</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartHistory as $product)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="assets/dest/images/shoping1.jpg" alt="">
                                <div class="media-body">
                                    <p class="font-large table-title">{{ $product->name }}</p>
                                    <hr>
                                    <p class="table-option">{{ $product->gender }}</p>
                                    <hr>
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">{{ number_format($product->unit_price) }}</span>
                        </td>

                        <td class="product-status">
                            {{ $product->payment}}
                        </td>
                        <td class="product-status">
                            {{ $product->address}}
                        </td>

                        <td class="product-status">
                            {{ $product->quantity}}
                        </td>

                        <td class="product-subtotal">
                            {{ number_format($product->total) }}
                        </td>

                        <td class="product-status">
                            {{ $product->note }}
                        </td>

                        <td class="product-status">
                            {{ $product->created_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End of Shop Table Products -->
        </div>
        <!-- <div class="clearfix"></div> -->
    </div>
    <!-- End of Cart Collaterals -->
    <!-- <div class="clearfix"></div> -->

</div> <!-- #content -->
</div> <!-- .container -->
<script>
    window.addEventListener('scroll', function() {
        var thead = document.getElementById('nav12322');
        var tableOffsetTop = 280;
        var currentScroll = window.pageYOffset;
        if (currentScroll >= tableOffsetTop) {
            thead.classList.add("fixed");
        } else {
            // thead.classList.remove('fixed');
            thead.className = '';
        }
    });
</script>
@endsection