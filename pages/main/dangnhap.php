<?php
include("link.php");
?>
<?php
    // session_start();
    // include("config/connect.php");
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM user_register WHERE email='".$email."' AND matkhau='".$password."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);//đếm số dòng của $row

        if($count > 0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
            
            header('Location: index.php?quanly=giohang');
        } else{
            echo '<script>alert("Email hoặc Mật khẩu sai. Vui lòng nhập lại!!!")</script>';
        }
    }
    ob_end_flush();
?>
<body>
    <div class="container pt-3" style="width: 700px;">
        <div style="background-color: rgb(236, 251, 236);">
            <form action="" autocomplete="off" method="post">
                <div class="text-center">
                    <h2 class="font-weight-bold pt-4">LOGIN ACCOUNT</h2>
                </div>
                <hr/>
            
                <div class="form-group row pt-4">
                    <label class="col-2 offset-2 pt-1" for="">Email:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-2 offset-2 pt-1" for="password">Password:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập vào mật khẩu" />
                    </div>
                </div>
                <div class="col-4 offset-4 pt-4" >
                    <div class="offset-2">
                        <button name="dangnhap" class="btn btn-warning me-2" style="background-color:#54c888; border-color:#3CB371 ;" 
                            type="submit">Đăng nhập</button>
                        <button class="btn btn-secondary" type="reset">Hủy</button>
                    </div>
                </div>
            </form>
            
            <hr/>

        </div>
    </div>
</body>
</html>