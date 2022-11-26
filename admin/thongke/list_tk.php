<div class="container-fluid">
        <div class="khung_list_title" style="width: 100%;height: 50px;">
            <h1>Thống kê sản phẩm</h1>
        </div>
        <div class="khung_list_sp" style="width: 100%;height: 3000px;">
            <div class="xuatsp" style="width: 100%; height: 800px;">
            <table style="width: 100%; height: 40%; text-align: center;">
                        <tr style="border-bottom: 1px solid #B2B2B2; background-color: #ced3d894;">
                            <th></th>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá Trung bình</th>
                            <th></th>
                        </tr>
                        <?php 
                            foreach ($list_tk as $key) {
                                extract($key);
                                echo '
                                <tr style="border-bottom: 1px solid #B2B2B2;">
                                <td><input type="checkbox" name="" id=""></td>
                                <td> ' . $ma_dm.'</td>
                                <td>' . $ten_dm .'</td>
                                <td>' . $count_sp .'</td>
                                <td>' . $min_price .'</td>
                                <td>' . $max_price .'</td>
                                <td>' . $avg_price .'</td>
                            </tr>
                                ';
                            }
                        ?>
                        
                    </table>
                    <div>
            <a href="index.php?act=bieudo"><input type="button" value="Biểu đồ" name="bieudo" style="color: #fff;background-color: #da542e;border-color: #da542e; border-radius: 2px; width: 80px; height: 35px; cursor: pointer; margin-top: 20px;"></a>
            </div>
            </div>
        </div>
</div>
<script>
        function confirmDesactiv()
{
   if(confirm("Bạn chắc chắn muốn xóa chứ ?"))
     return true;
  
  return false;
}
</script>