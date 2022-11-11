<div class="container-fluid">
    <div class="khung_add">
        <h1>Thêm mới sản phẩm</h1>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="danhmuc_sp" >
            <label for="">
                Danh mục : 
                <br>
                <select name="id_danhmuc" id="" style="margin-left: 80px;">
                <?php 
                     foreach ($listDM as $key) {
                        extract($key);
                        echo '
                        <option value="'. $id_danhmuc .'">'. $name_danhmuc .'</option>
                        ';
                     }
                ?>
                </select>
            </label>
            </div>
           <div class="Nhap_ten_sp">
            <label for="" >
                Tên sản phẩm :
            </label>
            <br>
            <input type="text" class="import" name="name_sp">
           </div>
           <div class="Nhap_gia_sp">
           <label for="" >
                Giá sản phẩm :
            </label>
            <br>
            <input type="text" class="import" name="price_sp">
           </div>
           <div class="Nhap_anh_sp">
           <label for="" >
                Ảnh sản phẩm :
            </label>
            <br>
            <input type="file" class="import" name="img_sp">
           </div>
           <div class="Nhap_mota_sp">
            <label for="">
                Mô tả sản phẩm : 
                <br>
                <textarea name="mota_sp" id="" cols="165" rows="10"></textarea>
            </label>
           </div>
            <div class="chucnang">
            <input type="submit" name="themmoi" id="" value="Thêm mới" >
                <a href="index.php?act=listsp" style="padding-left: 10px;">
                    <input type="button" id="" value="Danh sách">
                </a>
            </div>
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