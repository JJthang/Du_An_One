<?php 
     session_start();
     include "font_end/header.php";
     include "model/pdo.php";
     include "model/sanpham.php";
     include "global.php";
     include "model/taikhoan.php";
     include "model/cart.php";
     $spnew = load_sp_home();
     $spnew1 = load_sp_home2();
     $spnew2 = load_sp_home1();
     $spnew3 = load_sp_home3();
     $spnew4 = load_sp_home4();
     $spnew5 = load_sp_home5();
     $spnew6 = load_sp_home6();
     $spnew7 = load_sp_home7();
     
     if(!isset($_SESSION['mua_cart'])) $_SESSION['mua_cart'] = [];

     if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanphamct':
               if (isset($_GET["id_sp"]) && ($_GET['id_sp'] > 0)) {
                  $id = $_GET['id_sp'];
                  $one_sp = load_one_sanpham($id);
                  extract($one_sp);
                  $sp_cung_loai =  sanpham_cungloai($id, $id_danhmuc);
                  include "font_end/detail.php";
              }
                break;
            case 'go_home':
               include "font_end/home.php";
               break;
            
            case 'show_product':
               if (isset($_GET["id_sp"]) && ($_GET['id_sp'] > 0)) {
                  $id = $_GET['id_sp'];
                  $one_sp = load_one_sanpham($id);
                  extract($one_sp);
                  $sp_cung_loai =  sanpham_cungloai($id, $id_danhmuc);
                  include "font_end/detail.php";
              }
               include "font_end/show_product.php";
               break;
            
            case 'login':

               include "font_end/login-register.php";
            break;
            case 'dangky':
               if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                  $name_tk = $_POST['name_tk'];
                  $pass_tk = $_POST['pass_tk'];
                  $email_tk = $_POST['email_tk'];
                  $address_tk = $_POST['address_tk'];
                  $tel_tk = $_POST['tel_tk'];
                     insert_taikhoan($name_tk,$pass_tk,$email_tk,$address_tk,$tel_tk);
                     $thongbao = "chúc mừng bạn đã đăng ký thành công";
               }
               include "font_end/login-register.php";
            break;
            case 'dangnhap':
               if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                  $name_tk = $_POST['name_tk'];
                  $pass_tk = $_POST['pass_tk'];
                  $checktk = checklogin($name_tk,$pass_tk);
                  if ($checktk) {
                     $_SESSION['user'] = $checktk;
                     $thongbao = "Đăng nhập thành công";
                     include "font_end/login-register.php";
                  }else{
                     $thongbao = "Đăng nhập Thất bại xin vui lòng nhập lại";
                     include "font_end/login-register.php";
                  }
                  include "font_end/login-register.php";
               }
               break;
            case 'myaccount':

               include "font_end/my-account.php";
               break;
            case 'changes':
               if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                  $name_tk = $_POST['name_tk'];
                  $pass_tk = $_POST['pass_tk'];
                  $email_tk = $_POST['email_tk'];
                  $address_tk = $_POST['address_tk'];
                  $tel_tk = $_POST['tel_tk'];
                  $id_tk = $_POST['id_tk'];
                  update($id_tk, $name_tk, $pass_tk, $email_tk, $address_tk,$tel_tk);
                  $_SESSION['user'] = checklogin($name_tk,$pass_tk);
               }
               include "font_end/my-account.php";
            break;
            case 'log_out':
               session_unset();
               include "font_end/my-account.php";
               
               break;
            case 'dohang':
               include "font_end/dohang.php";
               break;
            case 'cart':
               if (isset($_POST['add_to_cart']) && ($_POST['add_to_cart'])) {
                  $id_sp = $_POST['id_sp'];
                  $name_sp = $_POST['name_sp'];
                  $img_sp = $_POST['img_sp'];
                  $price_sp = $_POST['price_sp'];
                  $soluong = 1;
                  $sp_add_to_cart = [$id_sp,$name_sp,$img_sp,$price_sp,$soluong];
                  array_push($_SESSION['mua_cart'],$sp_add_to_cart);
               }
               include "font_end/home.php";
               break;
            case 'delete_cart':
               if (isset($_GET['idcart'])) {
                  array_splice($_SESSION['mua_cart'],$_GET['idcart'],1);
               }else{
                  $_SESSION['mua_cart'] = [];
               }
               $yourURL="http://localhost/Du_An_1/back_end/matrix-admin-master/index.php?act=dohang";
               echo ("<script>location.href='$yourURL'</script>");
               break;
            case 'dat_hang':

               include 'font_end/dat_hang.php';
               break;
            case 'bill_confirm':
               if (isset($_POST['dong_y_dat_hang']) && ($_POST['dong_y_dat_hang'])) {
                  if (isset($_SESSION['user'])) {
                     $userid = $_SESSION['user']['id_tk'];
                  }else{
                     $id = 0;
                  }
                  $name_bill = $_POST['name_tk'];
                  $email_bill = $_POST['email_tk'];
                  $address_bill = $_POST['address_tk'];
                  $tel_bill = $_POST['tel_tk'];
                  $ordernote_bill = $_POST['ordernote'];
                  $pttt_bill = $_POST['paymentmethod'];
                  $ngay_dat_hang = date('h:i:sa d/m/Y');
                  $tongtien_bill = tong_donhang();

                  $id_bill = insert_bill($userid,$name_bill,$email_bill,$address_bill,$tel_bill,$ordernote_bill,$tongtien_bill,$pttt_bill,$ngay_dat_hang);
                  foreach ($_SESSION['mua_cart'] as $cart) {
                     insert_cart($_SESSION['user']['id_tk'], $cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$id_bill);
                  }
                  $_SESSION['mua_cart'] = [];
               }
               $bill = load_one_bill($id_bill);
               $billct = load_all_cart($id_bill);
               include "font_end/xac_nhan_don_hang.php";
               break;

            case'load_bill':
               if (isset($_SESSION['user'])) {
                  $list_bill = load_all_bill($_SESSION['user']['id_tk']);  
               }else{
                  $list_bill = [];
               }
               include 'font_end/load_bill.php';
               break;
            default:
                     include "font_end/home.php";
                break;
        }
     }else{
        include "font_end/home.php";
     }
     include "font_end/footer.php";
?>