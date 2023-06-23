<?php
    ob_start();
    $sql_danhmuc = "SELECT * FROM danhmuc_sp ORDER BY id_danhmuc ASC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MP Pet</title>
    <link rel="shortcut icon" href="./images/MP Pet.png" type="images">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .carousel_css{
            z-index: 10;
            height: 330px;
            margin: auto;
            width: 1000px;
        }
    </style>
</head>
<body>


<nav class="fixed-top navbar navbar-expand-lg navbar-light" style="background-color: #f1e8d9;">

            <div class="container-fluid">
                
                <!-- NÚT MENU -->         
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>  
    
                <!-- LOGO -->
                <a href="index.php"><img class="navbar-brand" style="width: 70px; height: 70px;" src="./images/MP Pet.png" alt=""></a>
                

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="col-8 navbar-nav me-5">
                        <li class="nav-item">
                            <a class="btn btn-secondary m-1" href="index.php" role="button">Trang chủ</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle m-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Danh mục
                            </a>
                            <div class="dropdown-menu">
                                <?php
                                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                ?>
                                <a class="dropdown-item" href="index.php?quanly=muahang&id=<?php echo $row_danhmuc['id_danhmuc']?>">
                                    <?php echo $row_danhmuc['tendanhmuc'] ?>
                                </a>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </li>

                        <li class="nav-item me">
                            <a class="btn btn-secondary m-1" href="index.php?quanly=tintuc">Tin tức</a>
                        </li> 
                        <li class="nav-item">
                            <a class="btn btn-secondary m-1" href="index.php?quanly=lienhe">Liên hệ</a>
                        </li>  
                        <li class="nav-item">
                            <a class="btn btn-secondary m-1" href="index.php?quanly=lichsudonhang">Đơn hàng</a>
                        </li>  
                        <?php
                            if(isset($_SESSION['dangky'])){
                        ?>
                            <li class="nav-item">
                                <a class="btn btn-secondary m-1" href="index.php?dangxuat=1">Đăng xuất</a>
                            </li>  
        
                            <li class="nav-item">
                                <a class="btn btn-secondary m-1" href="index.php?quanly=thaydoimatkhau">Đổi mật khẩu</a>
                            </li>  
                        <?php
                            }else{
                        ?>
                            <li class="nav-item">
                                <a class="btn btn-secondary m-1" href="index.php?quanly=dangky">Đăng ký</a>
                            </li>  
                        <?php
                            }
                        ?> 
                    </ul>
                    <!--===== TÌM KIẾM =====-->                 

                    <div class="col-3">
                        <form action="index.php?quanly=timkiem" method="POST" class="d-flex">
                            <input class="form-control me-2" type="search" name="tukhoa" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn btn-outline-secondary me-2" name="timkiem" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <!--===== GIỎ HÀNG =====-->                 
                    <ul class="col-1 navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-secondary m-2" href="index.php?quanly=giohang">
                                <i class="bi bi-cart"></i></a>
                        </li>
                    </ul>
                           
                </div>
                    
            </div>
        </nav>
        <hr/>
        <hr/>

       