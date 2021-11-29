<?
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
echo "<meta charset=\"UTF-8\">";
db_connect();
//--------------------------------------
$username = $_POST['username'];
$password = $_POST['password'];
//--------------------------------------
	$pass = base64_encode(trim($password));
	$hashpass = md5($pass);
	//exit();
//--------------------------------------
$sql_user_login = "select  * from member where memberUsername = '".$username."' and memberConfirm = '1'";
$result_user_login = get_a_line($sql_user_login);
 

//-----------------------
// echo $hashpass. "           ".$result_user_login['password']; exit();
//-----------------------


if($hashpass == $result_user_login['memberPassword']){
	//---------------------- Set Session Login
	$_SESSION['session_userid'] = session_id().date('Y-m-d').time();            //สร้าง session สำหรับเก็บค่า ID
	$_SESSION['session_user'] = $result_user_login['memberUsername'];      //สร้าง session สำหรับเก็บค่า Username
	$_SESSION['session_status'] = $result_user_login['memberType'];
	$_SESSION['session_password'] = $result_user_login['password'];
	//---------------------- Set Session Login
	//-------------------------------------------------
	if(!empty($_SESSION['session_user']) && !empty($_SESSION['session_userid'])){
		$insert_log = "insert into login set log_username = '".$_SESSION['session_user']."',
											 log_logintime = '".date('Y-m-d H:i:s')."',
											 log_ip = '".$_SERVER['REMOTE_ADDR']."',
											 log_status = 'complete',
											 log_sessionid = '".$_SESSION['session_userid']."'";
		insert_data($insert_log);
	}
	//-------------------------------------------------
	//-------------------------------------------------
	   /*$update_data = "update user_db set loginstatus ='1', session_id = '".$_SESSION['session_id']."' where username = '".$_SESSION['session_user']."'";

	   update_data($update_data);*/

	echo PHPgourl('index.php');
	//-------------------------------------------------
}else{
	//-------------------------------------------------
	  $insert_log = "insert into login set log_username = '$username', log_logintime = '".date('Y-m-d H:i:s')."', log_ip = '".$_SERVER['REMOTE_ADDR']."', log_status = 'hacker', log_sessionid = '".$_SESSION['session_id']."'";
		insert_data($insert_log);

	//-------------------------------------------------
	session_destroy();
	echo PHPalert('Username Or Password ไม่ถูกต้อง');
	echo PHPgourl('index.php');
}
?>
