<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm Activation Username of Nutrifacts 4.0</title>
</head>
<?
include('conn/config.php');
include('conn/function.inc.php');
//***************************************
db_connect();
//***************************************
$req_member = get_a_line("select memberType,memberConfirm from member where memberID = '".number_format($_GET['mid'])."'");
$resultTypemember = get_a_line("select * from membertype where typeid = '".$req_member['memberType']."'");
$day = $resultTypemember['typedaylimit'];
if($req_member['memberConfirm']==0){
$update_data = "update member set memberConfirm = '1',
								  memberConfirm_datetime = '".date('Y-m-d H:i:s')."',
								  memberTimeStart = '".date('Y-m-d H:i:s')."',
								  memberTimeStop = '".date('Y-m-d H:i:s',strtotime("+30 day"))."' where memberID = '".number_format($_GET['mid'])."'"; 
update_data($update_data); 
echo PHPalert("ระบบทำการเปิดใช้งานเรียบร้อยแล้ว");
}
echo PHPgourl('index.php');
?>
<body>
</body>
</html>