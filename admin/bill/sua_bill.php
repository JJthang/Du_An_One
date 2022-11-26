<?php 
     if (is_array($bill)) {
        extract($bill);
     }
?>

<div class="container-fluid">
        <div class="khung_list_title" style="width: 100%;height: 50px;">
            <h1>Cập nhật sản phẩm</h1>
        </div>
        <div class="show_update">
        <form action="index.php?act=update_bill" method="post" enctype="multipart/form-data">
           <div class="Nhap_ten_sp">
            <label for="" >
                Tình trạng sản phẩm :
            </label>
            <br>
            <input type="text" class="import" name="status_bill" value="<?php echo $status_bill ?>">
           </div>
           </div>
            <div class="chucnang">
            <input type="hidden" name="id_bill" value="<?=$id_bill?>">
            <input type="submit" name="capnhat" id="" value="Cập nhật" value="Sửa" style="color: #fff;background-color: #28b779;border-color: #28b779; border-radius: 2px; width: 80px; height: 35px; cursor: pointer;">
                <a href="index.php?act=don_hang" style="padding-left: 10px;">
                    <input type="button" id="" value="Danh sách" style="color: #fff;background-color: #da542e;border-color: #da542e; border-radius: 2px; width: 80px; height: 35px; cursor: pointer;">
                </a>
            </div>
            <?php 
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
            ?>
        </form>
        </div>
</div>