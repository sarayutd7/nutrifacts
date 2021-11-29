<?php
include('conn/config.php');
include('conn/function.inc.php');
//***************************************
db_connect();
//***************************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Confirm Activation Username of Nutrifacts 4.0</title>
</head>

<body>
    <?php
//********************************************************
//********************************************************
//******************************************************** 
//    require_once('phpmailer/class.phpmailer.php');
//********************************************************
//********************************************************
//********************************************************
//$reg_sql = "select * from member where memberID = '".$_GET['mdc']."'";
//$req_member = get_a_line($reg_sql);

//$MailSubject = "Confirm Activation Username of Nutrifacts 4.0";
//$text = "<p>เรียน ".$req_member['memberUsername']."</p>";
//$text .= "<p>ขอแจ้งให้ทราบว่าการลงทะเบียนขอใช้บริการ Nutrifacts 4.0 สำเร็จเรียบร้อยแล้ว</p>";
//$text .= "<p>กรุณา Click ยืนยันตัวตน เพื่อเปิดใช้งาน >> <a href='http://dmu1.rihes.cmu.ac.th/nutrifacts/comfirm.php?mid=".$req_member['memberID']."' target='_blank'>ยืนยันการเปิดใช้งาน </a><< </p>";  
//$text .= "<p><center>กรุณาอย่าตอบกลับ</center></p>";

//function sent_mail($mailrecep,$MailSubject,$text){
//
////------------- 
//$MailTo = $mailrecep;//$mailrecep;
////------------- 
//
//// $MailFrom = $_POST['MailFrom'] ;radchanok@rihes-cmu.org
//
//$MailFrom = $MailSubject ;
//
//$MailFrom2 = "";
//
//$Headers .= "MIME-Version: 1.0\r\n" ;
//
//$Headers .= "Content-Type: text/html; charset=utf-8\r\n" ;
//
////$Headers .= "From: ".$MailTo." <".$MailTo.">\r\n" ;
//
//$Headers .= "From: nutrifct@hchiv.rihes.cmu.ac.th\r\n" ;
//
//$Headers .= "Reply-to: ".$MailFrom." <".$MailFrom.">\r\n" ;
//
//$Headers .= "X-Priority: 3\r\n" ;
//
//$Headers .= "X-Mailer: PHP mailer\r\n" ;
//
//$MailMessage = $text; 
//
//$statusSendmail = mail($MailTo, $MailFrom , $MailMessage, $Headers, $MailFrom2);
//return $statusSendmail;
//    
//}
    //echo $req_member['memberEmail']." ".$MailSubject;
    //exit();
//if(sent_mail($req_member['memberEmail'],$MailSubject,$text)!=0) {
//
//  
//
//  echo PHPalert("Send Mail completed");
//
//  //echo PHPgourl('index.php');
//
// }else{
//
//  echo PHPalert("Send Mail False"); //ไม่สามารถส่งเมล์ได้
//
// }

echo PHPgourl("http://dmu1.rihes.cmu.ac.th/sendmail/nutrifacts.php?mdc=$_GET[mdc]");
 
    ?>
</body>

</html>