<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login for order</title>
    <?php require_once "template/top.php"; ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/order_login.css?v=<?php echo time(); ?>"
        type="text/css">
</head>

<body>
    <?php include_once "template/navbar.php" ?>
    <h1>1. Khách hàng mới / Đăng nhập</h1>
    <div class="row box">
        <div class="col-xs-12 col-sm-8 pad-right-0">
            <div class="box-login-register">
                <ul class="nav-register">
                    <li>
                        <a href="#" class="sub-nav login-form active">
                            <span>ĐĂNG NHẬP</span>
                            <i>Đã là thành viên</i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sub-nav register-form">
                            <span>TẠO TÀI KHOẢN</span>
                            <i>Dành cho khách hàng mới</i>
                        </a>
                    </li>
                </ul>
                <div class="login-register-content">
                    <div id="login-form">
                        <form class="login-form-content form" action="<?php echo base_url('Login/login_confirm')?>" method="POST">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Vui lòng nhập Email của bạn">
                                <span class="text-danger"><?php echo form_error('username')?></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                                <span class="text-danger"><?php echo form_error('password')?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-large btn-info btn-submit" value="Đăng Nhập">
                                <?php
                                echo '<label class="text-danger">'. $this->session->flashdata("error").'</label>';
                                ?>
                            </div>
                            
                        </form>
                    </div>
                    <div id="register-form" style="display:none">
                        <form class="register-form-content form" action="<?php echo base_url('Login/register')?>" method="POST">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_email" class="form-control" placeholder="Nhập Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input type="text" name="username" class="form-control" placeholder="Nhập Họ và Tên">
                            </div>
                            <div class="form-group">
                                <label>Số Điện Thoại</label>
                                <input type="text" name="phone" class="form-control"
                                placeholder="Nhập Số Điện Thoại">
                            </div>  
                            <div class="form-group">
                                <label>Địa Chỉ Giao Hàng</label>
                                <input type="text" name="address" class="form-control"
                                    placeholder="Nhập Địa Chỉ Giao Hàng">
                            </div>
                            <button type="submit" class="btn btn-large btn-warning btn-submit">TẠO TÀI KHOẢN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/template.js"></script>
    <script src="<?php echo base_url(); ?>public/js/order_login.js"></script>
</body>

</html>