<?php 
     session_start();
     include "font_end/header.php";
     include "model/pdo.php";
     include "model/sanpham.php";
     include "global.php";
     include "model/taikhoan.php";
     $spnew = load_sp_home();
     $spnew1 = load_sp_home2();
     $spnew2 = load_sp_home1();
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
            default:
                     include "font_end/home.php";
                break;
        }
     }else{
        include "font_end/home.php";
     }
     include "font_end/footer.php";
?>