<?php
    $sql_lietke_dmbv = "SELECT * FROM danhmucbaiviet ORDER BY thutu DESC"; 
    $query_lietke_dmbv = mysqli_query($mysqli, $sql_lietke_dmbv);
?>

    <h5 class="fw-bold offset-1">Liệt kê danh mục bài viết</h5>
    <div class="pt-3">
      <table class="offset-1 table" style="width: 500px; background-color:white;">
        <thead style="background: rgb(213, 226, 250);">
          <tr>
            <th>id</th>
            <th>Tên danh mục bài viết</th>
            <th>Quản lý</th>
          </tr>
        </thead>
      
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_dmbv)) {
                $i++;
        ?>

        <tbody>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
            <td>
                <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>" 
                    class="text-decoration-none">Xoá</a> |
                <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>" 
                    class="text-decoration-none">Sửa</a>
            </td>
          </tr>
        </tbody>
        <?php
            }
        ?>
      </table>
    </div>
    <br>
  </div>

