<?php
    include('../../config/connect.php');

    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    //HINH ANH
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;

    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

    //THEM
    if(isset($_POST['themsanpham'])) {
        $sql_them = "INSERT INTO sanpham(tensanpham, masp, giasp, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) VALUE (
                    '".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlysp&query=them');
    } elseif (isset($_POST['suasanpham'])) {
    //SUA
        if(!empty($_FILES['hinhanh']['name'])){

            move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
            
            $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."',
                soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."',
                id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
            //Xoa hinh anh cũ
            $sql = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        } else{
            $sql_update = "UPDATE sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', giasp='".$giasp."',
                soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', 
                id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
        }
        
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlysp&query=them');
    } else{
    //XOA
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM sanpham WHERE id_sanpham='.$id.' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM sanpham WHERE id_sanpham='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>