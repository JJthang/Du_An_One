<div class="container-fluid">
        <div class="khung_list_title" style="width: 100%;height: 50px;">
            <h1>Danh sách bình luận</h1>
        </div>
        <div class="khung_list_sp" style="width: 100%;height: 3000px;">
            <div class="xuatsp" style="width: 100%; height: 800px;">
            <table border="1px" style="width: 100%; height: 40%; text-align: center;">
                        <tr >
                            <th></th>
                            <th>MÃ BÌNH LUẬN</th>
                            <th>CONTENT</th>
                            <th>ID_USER</th>
                            <th>ID_PRO</th>
                            <th>DATE_BL</th>
                            <th>USER_NAME</th>
                        </tr>
                        <?php 
                            foreach ($xuatBL as $key) {
                                extract($key);
                                $xoasp = "index.php?act=xoabl&id_bl=".$id_bl;
                                echo '
                                <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td> ' . $id_bl.'</td>
                                <td>' . $content_bl .'</td>
                                <td>' . $id_pro .'</td>
                                <td>' . $date_bl .'</td>
                                <td>' . $user_name .'</td>
                                <td> <a href="'.$xoasp.'"><input Onclick="return confirmDesactiv()" type="button" value="Xóa" class="check"></a></td>
                            </tr>
                                ';
                            }
                        ?>
                        
                    </table>
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