<div class="sidebar">

<ul class="list_sidebar">
    <h5 class="text-center pt-2">Danh mục sản phẩm</h5>
    <?php
        $sql_danhmuc = "SELECT * FROM danhmuc_sp ORDER BY id_danhmuc ASC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while($row = mysqli_fetch_array($query_danhmuc)){
    ?>
    <li><a href="index.php?quanly=muahang&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
    <?php
        }
    ?>
    
</ul>

<ul class="list_sidebar">
    <h5 class="text-center pt-2">Danh mục hỏi đáp</h5>
    <?php
        $sql_danhmuc_bv = "SELECT * FROM danhmucbaiviet ORDER BY id_baiviet ASC";
        $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
        while($row = mysqli_fetch_array($query_danhmuc_bv)){
    ?>
    <li><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
    <?php
        }
    ?>
    
</ul>
</div>

