<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $password_old = md5($_POST['password_cu']);
        $password_new1 = md5($_POST['password_moi']);
        $password_new2 = md5($_POST['password_cmoi']);

        $sql = "SELECT * FROM user_register WHERE email='".$taikhoan."' AND matkhau='".$password_old."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);//đếm số dòng của $row
        if(($count > 0) && ($password_new1 != $password_old) && ($password_new1 == $password_new2)){
            $sql_update = mysqli_query($mysqli, "UPDATE user_register SET matkhau='".$password_new1."' WHERE 
                user_register.email = '$_POST[email]' ");
            echo '<script>alert("Mật khẩu đã được thay đổi");</script>';

        } elseif(($count > 0) && ($password_new1 == $password_old)){
            echo '<script>alert("Mật khẩu mới không được trùng với mật khẩu cũ!");</script>';

        } elseif(($count > 0) && ($password_new1 != $password_new2)){
            echo '<script>alert("Mật khẩu mới không giống nhau!!!");</script>';
            
        } else{
            echo '<script>alert("Email hoặc Mật khẩu cũ không đúng. Vui lòng nhập lại!!!");</script>';
        }
    }
?>
<body>
    <div class="container pt-3" style="width: 700px;">
        <div style="background-color: rgb(236, 251, 236);">
            <form action="" autocomplete="off" method="post">
                <div class="text-center">
                    <h2 class="font-weight-bold pt-4">CHANGE YOUR PASSWORD</h2>
                </div>
                <hr/>
            
                <div class="form-group row pt-4">
                    <label class="col-3 offset-2 pt-1" for="">Email:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">Old password:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_cu" placeholder="Nhập mật khẩu cũ" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">New password:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_moi" placeholder="Nhập mật khẩu mới" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">Confirm password:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_cmoi" placeholder="Nhập lại mật khẩu mới" />
                    </div>
                </div>
                <div class="col-4 offset-4 pt-4" >
                    <div class="offset-2">
                        <button name="doimatkhau" class="btn btn-warning me-2" style="background-color:#54c888; border-color:#3CB371 ;" 
                            type="submit">Đổi mật khẩu</button>
                        <button class="btn btn-secondary" type="reset">Hủy</button>
                    </div>
                </div>
            </form>
            
            <hr/>

        </div>
    </div>
</body>