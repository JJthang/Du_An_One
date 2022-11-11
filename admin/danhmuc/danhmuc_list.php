<div class="container-fluid">
        <div class="khung_danhsach">
            <table border="1px" style="width: 100%; height: 50%; text-align: center;">
                <tr>
                        <th></th>
                        <th>mã Loại</th>
                        <th>Tên Loại</th>
                </tr>
                <?php 
                     foreach ($xuatDM as $key) {
                        extract($key);
                        $suadm = "index.php?act=suadm&id_danhmuc=".$id_danhmuc;
                        $xoadm = "index.php?act=xoadm&id_danhmuc=".$id_danhmuc;
                        echo '
                        <tr>
                        <td>'. $id_danhmuc .'</td>
                        <td>' . $name_danhmuc . '</td>
                        <td>
                        <a href="'.$suadm.'"><input type="button" value="Sửa"></a>
                        <a href="'.$xoadm.'"><input type="button" value="Xóa"></a>
                        </tr>
                        ';
                     }
                ?>
            </table>
        </div>
</div>