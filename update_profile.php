<?php
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
?>
<html>
    <head>
       <meta charset="utf-8">
       <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW" >
    </head>
    <body>
<?
//------------------------------------------------
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//------------------------------------------------

$update = "update member set memberFirstname = '".$_REQUEST['firstname']."',
                             memberLastname = '".$_REQUEST['lastname']."',
                             memberGenden = '".$_REQUEST['gender']."',
                             memberDateofBirth = '".date('Y-m-d',strtotime($_REQUEST['birthday']))."',
                             memberEmail = '".$_REQUEST['userEmail']."',
                             memberLastupdatetime = '".date('Y-m-d H:i:s')."'
           where memberUsername = '".$_SESSION['session_user']."' ";
update_data($update);
//----------------------------------
$insert_hw = "insert into real_height_weight set memberID = '".$result_user_login['memberID']."', 
                                                 real_height = '".$_REQUEST['height']."', 
                                                 real_weight = '".$_REQUEST['weight']."',
                                                 real_waist = '".$_REQUEST['waist']."',
                                                 real_hip = '".$_REQUEST['hip']."',
                                                 
                                                 real_hw_datetime = '".date('Y-m-d H:i:s')."'"; 
insert_data($insert_hw); 
//----------------------------------
echo PHPalert("บันทึกข้อมูลเรียบร้อย");
//        exit();
echo PHPgourl('index.php?task=profile');
?>
    </body>
</html>