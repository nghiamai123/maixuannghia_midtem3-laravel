@extends('layouts.master');
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đặt hàng</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">

		<form action="#" method="post" class="beta-form-checkout">
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" placeholder="Street Address" required>
					</div>


					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" required>
					</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head">
							<h5>Đơn hàng của bạn</h5>
						</div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
									<!--  one item	 -->
									<div class="media">
										<img width="25%" src="/source/assets/dest/images/shoping1.jpg" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">Men's Belt</p>
											<span class="color-gray your-order-info">Color: Red</span>
											<span class="color-gray your-order-info">Size: M</span>
											<span class="color-gray your-order-info">Qty: 1</span>
										</div>
									</div>
									<!-- end one item -->
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left">
									<p class="your-order-f18">Tổng tiền:</p>
								</div>
								<div class="pull-right">
									<h5 class="color-black">$235.00</h5>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head">
							<h5>Hình thức thanh toán</h5>
						</div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>
								</li>

							</ul>
						</div>

						<div class="text-center"><a class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></a></div>
					</div> <!-- .your-order -->
				</div>
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