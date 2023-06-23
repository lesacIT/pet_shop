<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    } 
    // else{
    //     $tukhoa = '';
    // }
    $sql_pro = "SELECT * FROM sanpham, danhmuc_sp WHERE sanpham.id_danhmuc = danhmuc_sp.id_danhmuc
        AND sanpham.tensanpham LIKE '%".$tukhoa."%' ";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?> 
<h4 style="display: inline-block; border-bottom: 3px solid #e74c3c;">
    Kết quả tìm kiếm với từ khóa: <?php echo $_POST['tukhoa'] ;?></h4>
<ul class="product_list pt-3">
    <?php
        while($row = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a class="text-decoration-none" href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
            <img src="admin/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
            <p class="title_produce"><?php echo $row['tensanpham'] ?></p>
            <p class="price_produce">Giá: <?php echo number_format($row['giasp'],0,',','.') ?></p>
            <p style="font-weight:bold; text-align: center; color: #e2619f;"><?php echo $row['tendanhmuc']?></p>
        </a>
    </li>
    <?php
        }
    ?>

</ul>