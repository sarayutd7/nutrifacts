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
    $sql_insert = "insert into reference_fd set reference = '".$_REQUEST['reference']."', reference_status = '".$_REQUEST['reference_status']."', 
                                        reference_notice = '".$_REQUEST['type_notice']."', 
                                        reference_modify_by = '".$_SESSION['session_user']."', 
                                        reference_modify_datetime = '".date('Y-m-d H:i:s')."'";
    insert_data($sql_insert);
    // exit();
    echo PHPgourl('index.php?task=mgmt_reference_fd');
    
}
?>