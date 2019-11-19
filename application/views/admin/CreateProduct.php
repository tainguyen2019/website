<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once('template/header.php'); ?>
	<link rel="stylesheet" href="<?php echo base_url('public/css/admin/AdminPage.css'); ?>">
	<title>Trang thêm sản phẩm</title>
</head>

<body class="d-flex flex-column min-vh-100">
	<?php include_once('template/navigation.php') ?>
	<div class="row flex-grow-1 m-0">
		<?php include_once('template/sidebar.php') ?>
		<div class="col-md-10 bg-light">
			<h1>Thêm sản phẩm</h1>
			<hr>
			<form action="<?php echo base_url('admin/products/insert_product') ?>" method="post" class="text-center mr-4">
				<h4>Thông tin cơ bản</h4>
				<label for="product_name" class="col-md-2">Tên sản phẩm: </label>
				<input class="p-2 m-2 col-md-6 rounded" type="text" name="product_name" id="product_name" required autofocus><br />
				<label for="category" class="col-md-2">Loại sản phẩm: </label>
				<select class="custom-select p-2 m-2 col-md-6 rounded form-control-lg" id="category" name="category">
					<?php foreach ($categories as $category) { ?>
						<option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
					<?php } ?>
				</select><br />
				<label for="quantity" class="col-md-2">Số lượng: </label>
				<input class="p-2 m-2 col-md-6 rounded" type="text" name="quantity" id="quantity" required><br />
				<label for="cost" class="col-md-2">Giá tiền: </label>
				<input class="p-2 m-2 col-md-6 rounded" type="text" name="cost" id="cost" required><br />
				<div class="col-md-8 ml-4 p-4 d-inline">
					<button type="submit" class="btn bg-success m-2 text-dark font-weight-bold">Lưu</button>
					<button type="button" class="btn bg-danger m-2 text-decoration-none">
					<a href="<?php echo base_url('admin/products') ?>" class="text-decoration-none text-dark font-weight-bold">Hủy</a>
					</button>
				</div>
			</form>
		</div>
</body>

</html>