<?php ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
echo "<meta charset=\"UTF-8\">";
//***************************************
db_connect();
//***************************************

$dob = date('Y-m-d',strtotime($_REQUEST['calendar']));
$confirmPassword = trim($_REQUEST['password']);
$pass2 = trim($_REQUEST['cf_password']);
//------------------------------------------------------
if($confirmPassword == $pass2){
$confirmPassword64en = base64_encode($confirmPassword);
//echo "<br>";
$passMd = md5($confirmPassword64en);
//echo "<br>";
//------------------------------------------------------

$insert_data = "insert into member set memberCode = '".$_REQUEST['code']."',
									   memberUsername = '".$_REQUEST['username']."', 
									   memberGenden  = '".$_REQUEST['gender']."',
									   memberDateofBirth = '".$dob."',
									   memberEmail = '".$_REQUEST['email']."',
									   memberPassword = '$passMd',
									   memberDateregister = '".date('Y-m-d H:i:s')."',
									   memberIp = '".$_REQUEST['ip']."',
									   memberConfirm = '0',
									   memberType = '1'"; 
insert_data($insert_data);
session_destroy();  
$sql = "select * from member where memberUsername = '".$_REQUEST['username']."' and memberGenden  = '".$_REQUEST['gender']."' and memberEmail = '".$_REQUEST['email']."' and memberDateofBirth = '".$dob."'";
$req_member = get_a_line($sql); //exit();
//echo PHPalert("เพิ่มข้อมูลผุ้ใช้งานเรียบร้อยแล้ว");
$url = 'comfirmregister.php?mdc='.$req_member['memberID']; //exit();
echo PHPgourl($url);
}else{
echo PHPalert("Password ไม่เหมือนกันไม่สามารถทำการบันทึกข้อมูลได้");	
echo PHPgourl('index.php');
}
	//-------------------------------------- 
	//-------------------------------------- 
	//-------------------------------------- 
	//-------------------------------------- 
 
?>