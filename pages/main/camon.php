<?php
include("admin/config/connect.php");
require("carbon/autoload.php");

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
if(isset($_GET['partnerCode'])){
    $code_order = rand(0,9999);
    $id_khachhang = $_SESSION['id_khachhang'];

    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $cart_payment = 'momo';
    //lay id thong tin van chuyen
    $sql_get_vanchuyen =  mysqli_query($mysqli,"SELECT * FROM shipping WHERE id_dangky = '$id_khachhang' LIMIT 1");
    $row_get_vc = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row_get_vc['id_shipping'];

    //insert database momo
    $insert_momo = "INSERT INTO momo(partner_code, order_id, amount, order_info, order_type, trans_id, pay_type, code_cart) VALUES
        ('".$partnerCode."', '".$orderId."', '".$amount."', '".$orderInfo."', '".$orderType."', '".$transId."', '".$payType."', '".$code_order."')";
    $cart_query = mysqli_query($mysqli, $insert_momo);
    
    if($cart_query){
        $insert_cart = "INSERT INTO cart(id_khachhang, code_cart, cart_status, cart_date, cart_payment, cart_shipping) VALUE('".$id_khachhang."', '".$code_order."',1, 
            '".$now."', '".$cart_payment."', '".$id_shipping."')";
        $cart_query = mysqli_query($mysqli, $insert_cart);
        //thêm đơn hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO cart_details(id_sanpham, code_cart, soluongmua) VALUES ('".$id_sanpham."',
                '".$code_order."', '".$soluong."')";
            mysqli_query($mysqli, $insert_order_details);
        }
        echo '<h3 style="color: green; margin-left: 3%;">Giao dịch thanh toán bằng MOMO thành công!</h3>';
        echo '<p style="margin-left: 3%;">Vui lòng vào trang <a class="text-decoration-none" target="_blank" href="index.php?quanly=lichsudonhang">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng này của bạn</p>';
    } else{
        echo 'Giao dịch MOMO thất bại';
    }
}
?>

<div class="border mt-4" style="border-radius: 10px; margin-left: 15%; width: 650px;">
    <h5 class="py-2" style="size: 20px; margin-left: 7%; color: rgb(148,95,81);; ">
        Cảm ơn bạn đã đặt hàng của MP PET <br>
        Chúng tôi sẽ liên hệ bạn qua <b>Email</b> trong thời gian sớm nhất!
    </h5>
    <img class="rounded mx-auto d-block" style="width: 300px; height: 250px;" src="https://img.freepik.com/premium-vector/badge-thank-you-cat-dog-together-vector-illustration_644677-25.jpg?w=2000" alt="">
</div>

