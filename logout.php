<?
ob_start();
session_start();
/*echo $_SESSION['session_user']id;
echo "<br>";
echo $_SESSION['session_user'];
echo "<br>";
echo $session_status;
echo "<br>";*/



include('conn/config.php');
include('conn/function.inc.php');

if($_SESSION['session_user']!=''){
	db_connect();
	//-------------------------------------------------
	$insert_log = "insert into login set log_username = '".$_SESSION['session_user']."', log_logintime = '".date('Y-m-d H:i:s')."', log_ip = '".$_SERVER['REMOTE_ADDR']."', log_status = 'logout', log_sessionid = '".$_SESSION['session_userid']."'";
	insert_data($insert_log);
	//-------------------------------------------------
	update_data("update user_db set loginstatus ='0', session_id = '' where username = '".$_SESSION['session_user']."'");
	//-------------------------------------------------
	
	unset ($_SESSION['session_userid']);
	unset ($_SESSION['session_user']);
	unset ($_SESSION['session_status']);
	session_destroy();
	echo PHPgourl('index.php');
}else{
	echo PHPgourl('login.php');
}
?>