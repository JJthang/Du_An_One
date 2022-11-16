<div class="container-fluid">
        <div class="khung_list_title" style="width: 100%;height: 50px;">
            <h1>Danh sách tài khoản</h1>
        </div>
        <div class="khung_list_sp" style="width: 100%;height: 3000px;">
            <div class="xuatsp" style="width: 100%; height: 800px;">
            <table border="1px" style="width: 100%; height: 40%; text-align: center;">
                        <tr >
                            <th></th>
                            <th>MÃ TÀI KHOẢN</th>
                            <th>TÊN TÀI KHOẢN</th>
                            <th>PASS TÀI KHOẢN</th>
                            <th>EMAIL TÀI KHOẢN</th>
                            <th>ADDRESS TÀI KHOẢN</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <input type="text"  >

                        </tr>
                        <?php 
                            foreach ($xuattk as $key) {
                                extract($key);
                                $sua_tk = "index.php?act=sua_tk&id_tk=".$id_tk;
                                $xoa_tk = "index.php?act=xoa_tk&id_tk=".$id_tk;
                                echo '
                                <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td> ' . $id_tk.'</td>
                                <td>' . $name_tk .'</td>
                                <td>' . $pass_tk .'</td>
                                <td>' . $email_tk .'</td>
                                <td>' . $address_tk .'</td>
                                <td>' . $tel_tk .'</td>
                                <td><a href="'.$sua_tk.'"><input type="button" value="Sửa" class="check"></a> <a href="'.$xoa_tk.'" ><input Onclick="return confirmDesactiv()" type="button" value="Xóa" class="check"></a></td>
                            </tr>
                                ';
                            }
                        ?>
                        
                    </table>
            </div>
            <?php
                 if (isset($thongbao) && ($thongbao)) {
                    echo $thongbao;
                 }
            ?>
        </div>
</div>
<script>
    function confirmDesactiv()
{
   if(confirm("Are you sure ?"))
     return true;
  
  return false;
}
</script>