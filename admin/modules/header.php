<?php
    include("./link.php")
?>
<?php
    if(isset($_GET['dangxuat']) && ($_GET['dangxuat']==1)){
        unset($_SESSION['dangnhap']);
        header('Location: login.php');
    }
?>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active text-decoration-none" href="index.php?dangxuat=1">
                <div class="text-end">
                    <i class="bi bi-person-circle"> Đăng xuất: 
                        <?php
                            if(isset($_SESSION['dangnhap'])){
                                echo $_SESSION['dangnhap'];
                            }
                        ?></i>
                </div>
            </a>
        </li>
    </ul>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f1e8d9;">

    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Thống kê</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?action=quanlyweb&query=capnhat">Thông tin</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>
            <!-- <ul class="admincp_list">
                <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
                <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
                <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
                <li><a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>

            </ul> -->
        <!-- </div> -->