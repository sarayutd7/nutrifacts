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
    $sql_update = "insert into food_type set type_name = '".$_REQUEST['food_type']."', type_type = '".$_REQUEST['type_type']."', 
                                        type_notice = '".$_REQUEST['type_notice']."', 
                                        type_modify_by = '".$_SESSION['session_user']."', 
                                        type_modity_datetime = '".date('Y-m-d H:i:s')."'";
    insert_data($sql_update);
    // exit();
    echo PHPgourl('index.php?task=mgmt_foodtype');
    
}
?>