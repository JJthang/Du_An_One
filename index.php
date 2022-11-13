<?php 
 
     include "font_end/header.php";
     include "model/pdo.php";
     include "model/sanpham.php";
     include "global.php";
     $spnew = load_sp_home();
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
            
            default:
                     include "font_end/home.php";
                break;
        }
     }else{
        include "font_end/home.php";
     }
     include "font_end/footer.php";
?>