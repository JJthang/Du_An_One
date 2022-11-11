<div class="container-fluid">
    <div class="khung_add">
        <h1>Thêm mới danh mục</h1>
        <form action="index.php?act=adddm" method="post">
           <div class="Nhap_ten_dm">
            <label for="" >
                Tên danh mục :
            </label>
            <br>
            <input type="text" class="import" name="tenloai">
           </div>
                <input type="submit" name="themmoi" id="" value="Thêm mới" >
                <a href="index.php?act=listdm" style="padding-left: 10px;">
                    <input type="button"  id="" value="Danh sách">
                </a>
                
        </form>
        <br>
        <br>
        <?php 
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            }
        ?>
    </div>
</div>