<?php 
 
     include "font_end/header.php";
     if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'value':
                
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