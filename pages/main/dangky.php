<?php
include("link.php");
?>
<?php

    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO user_register(tenkhachhang, email, sdt, matkhau, diachi) VALUE
            ('".$tenkhachhang."', '".$email."', '".$dienthoai."', '".$matkhau."', '".$diachi."')");
        if($sql_dangky){
            // echo '<h4 style="color: green; text-align: center;">Bạn đã đăng ký thành công <br> Hãy quay lại trang giỏ hàng</h4>';
            echo '<script>alert("Bạn đã đăng ký thành công. Hãy quay lại trang giỏ hàng)</script>';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['email'] = $email;

            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);

            header('Location: index.php?quanly=giohang');
        }
    }
    if(isset($_POST['dangnhap'])){
        header('Location: index.php?quanly=dangnhap');
    }
    ob_end_flush();
?>
<body>
    <div class="container pt-1" style="width: 880px;">
        <div style="background-color: rgb(240, 251, 251);">
            <div class="text-center">
                <h2 class="font-weight-bold pt-3">CREATE ACCOUNT</h2>
            </div>
            <hr/>
            <form action="" method="post">
                <div class="row">
                    <div class="col-5 offset-3 pt-4" style="width: 400px;"  >
                        <input class="form-control m-3" type="text" name="hovaten" placeholder="Họ và tên của bạn">
                        <input class="form-control m-3" type="email" name="email" placeholder="Email của bạn">
                        <input class="form-control m-3" type="tel" name="dienthoai" placeholder="Số điện thoại">
                        <input class="form-control m-3" type="text" name="diachi" placeholder="Địa chỉ của bạn">                        
                        <input class="form-control m-3" type="password" name="matkhau" placeholder="Nhập mật khẩu">
                        <div class="offset-3 pt-2">
                            <button class="btn btn-primary" name="dangky" type="submit">Đăng ký</button>
                            <a href="index.php?quanly=dangnhap"><button class="btn btn-dark" name="dangnhap" type="submit">Đăng nhập</button></a>
                            <!-- <button class="btn btn-secondary" type="reset">Hủy</button> -->
                        </div>
                        <br>
                    </div>
                </div> 
            </form>
        </div>
    </div>
        
    
</body>
</html>