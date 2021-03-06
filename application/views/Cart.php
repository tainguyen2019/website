<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once 'template/top.php' ?>
	<title>Cart</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/cart.css?v=<?php echo time(); ?>" type="text/css">
</head>

<body>
	<?php include_once 'template/navbar.php' ?>
	<div id="notice">
	</div>
	<div class="cart-container row">
		<div class="col-xs-12">
			<h5 class="lbl-shopping-cart"> Giỏ hàng
				<span>(<?php echo $this->cart->total_items() . ' sản phẩm' ?>)</span>
			</h5>
		</div>
		<div class="col-xs-8 cart-col-1">
			<form id="shopping cart">
				<?php
				if ($this->cart->total_items() > 0) {
					foreach ($cartItems as $Item) {
						?>
						<div class="row shopping-cart-item">
							<div class="col-xs-3 img-thumbnail-custom">
								<p class="image">
									<img class="img-responsive" src="<?php echo base_url('public/images/' . $Item['image']); ?>" alt="">
								</p>
							</div>
							<div class="col-right">
								<div class="box-info-product">
									<input type="hidden" class="hidden-quantity" value="1">
									<div class="badge-cart-a">
										<p class="name">
											<a href="#"><?= $Item['name'] ?></a>
										</p>
									</div>
									<p class="action" style="margin-top: 31px">
										<a href="<?php echo base_url('cart/RemoveItem/' . $Item['rowid']) ?>" class="btn btn-danger btn-item-del" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?')">
											<i class="fa fa-trash-o fa-1x" aria-hidden="true"></i>
										</a>
									</p>
								</div>
								<div class="badge-cart-a">
									<div class="box-size">
										<p>Giá sản phẩm : </p>
										<p class="price"><?= number_format($Item['price'], 0, '', '.') . ' VND'; ?></p>
										<div id="<?= $Item['id'] ?>">
											<?php if ($Item['discount'] > 0) { ?>
												<p class="font-weight-bold"><?php echo "- " . ($Item['discount'] * 100) . " %" ?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="badge-cart-a-link"></div>
								<div class="quantity-block">
									<div class="input-group">
										<input type="number" class="form-control quantity" value="<?php echo $Item['qty'] ?>" onchange="updateCartItem( this , '<?php echo $Item['rowid'] ?>' ,'<?php echo base_url() ?>cart/updateCartItem')">
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
			</form>
		</div>
		<div class="col-xs-4 cart-col-2">
			<div id="right-affix" class="affix-top">
				<div class="each-row">
					<div class="box-style fee">
						<p class="list-info-price">
							<span>Tạm tính: </span>
							<strong id="amount1"><?php echo number_format($total, 0, '', ',') . ' VND'; ?></strong>
						</p>
					</div>
					<div class="box-style fee">
						<div class="total2 clearfix">
							<span class="text-label">Thành tiền: </span>
							<div class="amount">
								<div id="amount2">
									<strong><?php echo number_format($total, 0, '', ',') . ' VND'; ?></strong>
								</div>
								<p class="text-right">
									<small>(Đã bao gồm VAT nếu có)</small>
								</p>
							</div>
						</div>
					</div>
					<a type="button" class="btn btn-large btn-block btn-danger btn-checkout text-white" href="<?php echo base_url('Order') ?>">
						Tiến hành đặt hàng
					</a>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="panel-group coupon">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">Mã giảm giá / Quà tặng</h4>
								</div>
								<div id="collapseOne3" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="input-group">
											<input id="coupon_code" class="form-control" name="coupon_code" type="text" placeholder="Nhập ở đây..">
											<span class="input-group-btn">
												<button class="btn btn-default btn-coupon" type="button" id="SubmitCode">Đồng ý</button>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else
				echo "Không có sản phẩm nào trong giỏ hàng !" ?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/template.js"></script>
	<script src="<?php echo base_url(); ?>public/js/cart.js"></script>
	<script>
		$("#coupon_code").change(function() {
			$("#SubmitCode").click(function() {
				$.ajax({
					url: "<?php echo base_url('cart/discount') ?>",
					type: "get",
					dataType: "text",
					data: {
						"coupon_code": $("#coupon_code").val()
					},
					success: function(result) {
						var arr = result.split('|');
						var check = (arr[0] === 'true');

						if (!check) {
							$("#notice").html(`<div class="alert alert-danger alert-dismissible">
    																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																		<strong>Mã giảm giá không hợp lệ !</strong>
  																	</div>`);
						} else {
							total = parseInt(arr[3], 10);
							var product_id = arr[1];
							var discount = parseFloat(arr[2], 10);
							if (discount > 0) {
								var amount = new Intl.NumberFormat().format(total) + " VND";
								$("#" + product_id).html(`<p class="font-weight-bold">- ${discount * 100} %</p>`);
								$("#amount1").html(`<p class="font-weight-bold">${amount}</p>`);
								$("#amount2").html(`<p class="font-weight-bold">${amount}</p>`);
								$("#notice").html(`<div class="alert alert-success alert-dismissible">
    															<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																	<strong>Mã giảm giá đã áp dụng thành công !</strong>
  																</div>`);
							}
						}
					}
				});
			});
		});
	</script>
</body>

</html>



