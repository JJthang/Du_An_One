<?php 
    include "../model/pdo.php";
    include "../model/danh_muc.php";
    include "../model/sanpham.php"; 
    include "header.php";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                include "danhmuc/danhmuc_add.php";
                break;
            case'listdm':
                $xuatDM = load_danh_all();
                include "danhmuc/danhmuc_list.php";
                break;
            case 'suadm':
                if (isset($_GET['id_danhmuc'])&& ($_GET['id_danhmuc'] > 0)) {
                    $sua_dm = load_one($_GET['id_danhmuc']);
                }
                include "danhmuc/danhmuc_update.php";
                break;
            case 'xoadm':
                     if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'])) {
                            delete_danhmuc($_GET['id_danhmuc']);
                     }
                     $sql = " select * from danhmuc order by id_danhmuc";
                     $xuatDM = pdo_query($sql);
                     include "danhmuc/danhmuc_list.php";
                break;
            case 'updatedm':
                      if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                        $id_danhmuc = $_POST['id'];
                        $name_danhmuc = $_POST['ten'];
                        update_dm($id_danhmuc, $name_danhmuc);
                        $thongbao = "Cập nhật thành công";
                      }
                      $load_dm = load_danh_all();
                      include "danhmuc/danhmuc_update.php";
                break;
            
            // controler Sản phẩm

            case 'addsp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $name_sp = $_POST['name_sp'];
                    $price_sp = $_POST['price_sp'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $img_sp = $_FILES['img_sp']['name'];
                    $taget_div = "../upload/";
                    $taget_file = $taget_div . basename($_FILES['img_sp']['name']);
                    if (move_uploaded_file($_FILES['img_sp']['tmp_name'],$taget_file)) {
                            //echo "chill";
                    }else{
                            //echo "chill";
                    }
                    $mota_sp = $_POST['mota_sp'];
                    insert_sanpham($name_sp,$img_sp, $price_sp,$mota_sp,$id_danhmuc);
                    $thongbao = "Cập nhật thành công";
                }
                $listDM = load_danh_all();
                include "sanpham/sanpham_add.php";
                break;
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }
    include "footer.php"
?>