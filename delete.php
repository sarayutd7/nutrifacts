<?php
//ob_start();
//session_start();
//include('conn/config.php');
//include('conn/function.inc.php');
//db_connect();

//------------------------------------------------
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//------------------------------------------------

if(!empty($_SESSION['session_user'])){
    
    delete("food_recorder","where user_id = '".$_GET['uid']."' and f_code = '".$_GET['fid']."'");
    echo PHPalert("ดำเนินการลบรายชื่ออาหารออกเรียบร้อยครับ");
    echo PHPgourl("http://dmu1.rihes.cmu.ac.th/nutrifacts/index.php?task=form");
}

?>