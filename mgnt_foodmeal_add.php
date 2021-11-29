<?php
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//--------------------------------------
 
if(!empty($_SESSION['session_user'])){
    $sql_update = "insert into food_meal set meal_name = '".$_REQUEST['food_mead']."', 
                                        meal_type = '".$_REQUEST['meal_type']."', 
                                        meal_notice = '".$_REQUEST['food_notice']."', 
                                        meal_modify_by = '".$_SESSION['session_user']."', 
                                        meal_modify_datetime = '".date('Y-m-d H:i:s')."'
                                        ";
    insert_data($sql_update);
     
    echo PHPgourl('index.php?task=mgmt_foodmeal');
    
}
?>