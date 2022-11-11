<?php 

    function insert_sanpham($name,$price,$img,$mota,$id_danhmuc)
    {
        $sql = "INSERT into sanpham(name,price,img,mota,id_danhmuc) values('$name','$price','$img','$mota','$id_danhmuc')";
        pdo_execute($sql);
    }
    function delete_sanpham($id)
    {
        $sql = "DELETE from sanpham where id = ".$id;
        pdo_query($sql);
    }
    function load_sp_top6()
    {
        $sql = "select * from sanpham where 1 order by view desc limit 0,6";
            $listsanpham= pdo_query($sql);
            return $listsanpham;
    }
    function load_sp_home()
    {
        $sql = "select * from sanpham where 1 order by id desc limit 0,12";
            $listsanpham= pdo_query($sql);
            return $listsanpham;
    }
    function load_sanpham($kyw = "", $id_danhmuc = 0)
    {
        $sql = "select * from sanpham where 1";
        if ($kyw!="") {
            $sql .= " and name like '%".$kyw."%'";
        }
        if ($id_danhmuc > 0) {
            $sql .= " and id_danhmuc = '".$id_danhmuc."'"; 
        }
        $sql .= " order by id desc";
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function load_one_sanpham($id)
    {
        if ($id >0) {
            $sql = "SELECT * from sanpham where id=". $id;
            $sp = pdo_query_one($sql); 
            return $sp;
        }else{
            return "";
        }
    }
    function sanpham_cungloai($id,$id_danhmuc)
    {
        $sql = "SELECT * from sanpham where id_danhmuc = ". $id_danhmuc ." AND id <>". $id;
        $listsanpham= pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id, $name, $price, $img,$mota, $id_danhmuc)
    {
        if ($img !="") {
            $sql = "UPDATE sanpham set id_danhmuc = '". $id_danhmuc ."', name = '".$name."', price ='".$price."', img = '".$img."'  , mota = '".$mota."' where id=".$id;
            pdo_execute($sql);
        }else{
            $sql = "UPDATE sanpham set id_danhmuc = '". $id_danhmuc ."', name = '".$name."', price = '".$price."' , mota = '".$mota."' where id=".$id;
            pdo_execute($sql);
        }
    }

?>