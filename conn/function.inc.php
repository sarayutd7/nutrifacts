<?php

function db_connect(){

	global $dbHost;

	global $dbuser;

	global $dbpass;

	global $dbname;

	$conn = mysql_connect($dbHost,$dbuser,$dbpass);

	mysql_select_db($dbname);

	mysql_query("SET character_set_results=utf8");

	mysql_query("SET character_set_client=utf8");

	mysql_query("SET character_set_connection=utf8");

}

function get_a_line($mysql)



{



if(!($result = mysql_query ("$mysql"))){$men = mysql_errno();$mem = mysql_error();echo ("<h4>$mysql  $men $mem</h4>");exit;}



$row = mysql_fetch_array ($result);



mysql_free_result ($result);



return $row;



}



//============== guery all ==============



function get_rsltset($mysql)



{



if (! ($result = mysql_query ("$mysql")))



{



$men = mysql_errno();



$mem = mysql_error();



echo ("<h4>$mysql  $men $mem</h4>");



exit;



}



else



{



while ( $row = mysql_fetch_array ($result) )



{



$rsltset[] = $row;



}



mysql_free_result($result);



return $rsltset;



}



}



//============== count data ==============



function rsltset_count($rs)



{



$i=0;



while($rs[$i][0])



{



$i++;



}



return $i;



}



//============== update data ==============



function update_data($mysql)



{



if (!mysql_query ("$mysql")){$men = mysql_errno();$mem = mysql_error();echo ("<h4>$mysql  $men $mem</h4>");return $men;exit;}



}



//============== insert data ==============



function insert_data($mysql)



{



if (!mysql_query ("$mysql"))



{



$men = mysql_errno();$mem = mysql_error();echo ("<h4>$mysql  $men $mem</h4>");return $men;exit;



}



}



//============== delete ==============



function delete($table,$condition)



{



$sql ="delete from $table $condition";



$re = mysql_query($sql);



return $result;



}







function deleteall($table)



{



$sql ="delete from $table";



$re = mysql_query($sql);



return $result;



}







//=============== select ==================



function select($table,$condition)



{



$sql = "select * from $table $condition";



$dbquery = mysql_query($sql);



$result= mysql_fetch_array($dbquery);



return $result;



}







//=============== Numrow ==================



function num_record($table,$condition)



{



$sql = "select * from $table $condition";



$dbquery = mysql_query($sql);



$num_rows = mysql_num_rows($dbquery);



return $num_rows;



}

function task($var){

	if($var==''){

		return "";

	}else{

		$task_tag .= "<li class='active'>";

        $task_tag .= "    <i class='fa fa-file'></i> $var";

        $task_tag .= "</li>";

		return $task_tag;

	}

}



function navi_tab($var){

	$navi_tab .= "<ol class='breadcrumb'>";

    $navi_tab .= "<li>";

    $navi_tab .= "<i class='fa fa-dashboard'></i>  <a href='index.php?task=main'>Dashboard</a>";

    $navi_tab .= "</li>";

	$navi_tab .= task($var);

	$navi_tab .= "</ol>";

	return $navi_tab;

}



/* ================== Java Function ================= */

function PHPalert($text)



  {



	echo '<script language="JavaScript">';



	echo "alert(\"".$text."\");";



	echo '</script>';



  }



 function PHPconfirm($text,$url)



  {



echo '<script language="JavaScript">';



echo "question = confirm(\"$text\"); if(question !=0){ top.location =\"$url\";}";



echo '</script>';



  }



function PHPgourl($text)



  {



	echo '<script language="JavaScript">';



	echo 'window.location="'.$text.'";';



	echo '</script>';



  }







  function PHPback()


  {



	echo '<script language="JavaScript">';



	echo 'history.back();';



	echo '</script>';



  }







 function PHPreload()



  {



	echo '<script language="JavaScript">';



	echo 'window.opener.location.reload();';



	echo '</script>';



  }







   function PHPJavaScript($text)



  {



	echo '<script language="JavaScript">';



	echo $text;



	echo '</script>';



  }

  function NummonthThaitoName($m){
	  $full_month_name_th = array('มกราคม'=>'01','กุมภาพันธ์'=>'02','มีนาคม'=>'03','เมษายน'=>'04','พฤษภาคม'=>'05','มิถุนายน'=>'06','กรกฎาคม'=>'07','สิงหาคม'=>'08','กันยายน'=>'09','ตุลาคม'=>'10','พฤศจิกายน'=>'11','ธันวาคม'=>'12');
	  foreach($full_month_name_th as $d=>$k){

		if($m==$k){
			$Number = $d;
		}
	}
	return $Number;
  }

  function monthThaitoNum($m){
	  $full_month_name_th = array('มกราคม'=>'01','กุมภาพันธ์'=>'02','มีนาคม'=>'03','เมษายน'=>'04','พฤษภาคม'=>'05','มิถุนายน'=>'06','กรกฎาคม'=>'07','สิงหาคม'=>'08','กันยายน'=>'09','ตุลาคม'=>'10','พฤศจิกายน'=>'11','ธันวาคม'=>'12');
	  foreach($full_month_name_th as $d=>$k){

		if($m==$d){
			$Number = $k;
		}
	}
	return $Number;
  }

  function monthEngtoNum($m){
	  $full_month_name_th = array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	  foreach($full_month_name_th as $d=>$k){

		if($m==$d){
			$Number = $k;
		}
	}
	return $Number;
  }

  function to_dateformat($date){

	$date_var = explode('/',$date);

	$short_month_name = array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');

	foreach($short_month_name as $d=>$k){

		if(strtoupper($date_var['1'])==strtoupper($d)){

			$var_month = $k;

		}

	}

	$dateformat = $date_var['2']."-".$var_month."-".$date_var['0'];

	return $dateformat;

}



function dateFormat($var_date){

	if($var_date!='0000-00-00' and $var_date!=''){

	$date = date_create($var_date);

	return strtoupper(date_format($date,"d/M/y")); //16/Feb/1917

	}else if($var_date==''){ return "";

	}else{ return ""; }

}



function dateFormatY($var_date){

	if($var_date!='0000-00-00' and $var_date!=''){

	$date = date_create($var_date);

	return strtoupper(date_format($date,"d/M/Y")); //16/Feb/1917

	}else if($var_date==''){ return "";

	}else{ return ""; }

}

function timeFormat($var){

	echo substr($var,0,5);

}



function icon_status($obj,$val,$truevaul){

							 if($obj=='radio'){

								 if($val==$truevaul){

									 $icon = 'fa-check-circle-o fa-lg';

								 }else{

									 $icon = 'fa-circle-o fa-lg';

								 }

							 }else{

								if($val==$truevaul){

									 $icon = 'fa-check-square-o fa-lg';

								 }else{

									 $icon = 'fa-square-o fa-lg';

								 }

							 }

							 return $icon;

						}

function edit_bt($ptask,$limitd,$rd_id){

					if($limitd<=15){

						$bt = "<a class=\"btn-xs btn-small bootpopup\"  href=\"?pid=".$_GET['pid']."&task=edit".$ptask."&rd=".$rd_id."\">";

						$bt .="<i class=\"fa fa-edit\"></i> Edit</a>";

					}

					return $bt;

				}
function numberFormat($val,$d){
	$n = number_format($val,$d, '.', '');
	return $n;
}

function reference_status($s){
	switch($s){
		case "P" : $ref_s = "Positive"; break;
		case "N" : $ref_s = "Negative"; break;
		case "I" : $ref_s = "Indeterminate"; break;
		case "E" : $ref_s = "Equivocal"; break;
		default : $ref_s = ""; break;
	}
	return $ref_s ;
}
function reference_status_rt($s){
	switch($s){
		case "R" : $ref_s = "Reaction"; break;
		case "N" : $ref_s = "Non-Reactive"; break;
		default : $ref_s = ""; break;
	}
	return $ref_s ;
}
function reference_status_rp($s){
	switch($s){
		case "less than" : $ref_s = "Less than"; break;
		case "equal to" : $ref_s = "Equal to"; break;
		case "greater than" : $ref_s = "Greater than"; break;
		case "Undetectable" : $ref_s = "Undetectable"; break;
		default : $ref_s = ""; break;
	}
	return $ref_s ;
}
function random_word($n){
$Caracteres_up = strtoupper('ABCDEFGHIJKLMOPQRSTUVXWYZ');
$Caracteres_lo = strtolower('ABCDEFGHIJKLMOPQRSTUVXWYZ');
$number = '0123456789';
$text = $Caracteres_up.$Caracteres_lo.$number;
$QuantidadeCaracteres = strlen($text);
$QuantidadeCaracteres--;

$Hash=NULL;
    for($x=1;$x<=$n;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($text,$Posicao,1);
    }
	return $Hash;
}
function random_filename($len)

{

srand((double)microtime()*10000000);

$chars = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz123456789";

$ret_str = "";

$num = strlen($chars);

	for($i = 0; $i < $len; $i++)

	{

	$ret_str.= $chars[rand()%$num];

	$ret_str.="";

	}

return $ret_str;

}



function random_id($len)

{

srand((double)microtime()*10000000);

$chars = "123456789";

$ret_str = "";

$num = strlen($chars);

	for($i = 0; $i < $len; $i++)

	{

	$ret_str.= $chars[rand()%$num];

	$ret_str.="";

	}

return $ret_str;

}



function checkfile($filename)

{

	if($filename == "application/pdf")	{    $exp=".pdf";	 }

	 else  if($filename == "application/msword")	{  $exp=".doc";  }

	 else  if($filename== "application/vnd.ms-excel")	{  $exp=".xls";   }

	 else  if($filename== "application/vnd.ms-powerpoint")	{  $exp=".ppt";   }

     else  if($filename== "application/vnd.visio")	{  $exp=".vsd";   }

	 else  if($filename== "image/png")	{  $exp=".png";   }

	else if($filename == "image/x-png")	{    $exp=".png";	 }

	else if($filename == "image/bmp")	{    $exp=".bmp";	 }

	else  if($filename== "image/pjpeg")	{  $exp=".jpg";   }

	else if($filename== "image/jpeg")	{  $exp=".jpg";   }

    	else  if($filename == "image/gif")	{  $exp=".gif";   }

	else if($filename == "video/mp4")	{  $exp=".mp4";   }

	else if($filename == "audio/mpeg3")	{  $exp=".mp3";   }

	else if($filename == "audio/mp3")	{  $exp=".mp3";   }

	else  if($filename == "application/x-shockwave-flash"){  $exp=".swf";   }

return $exp;

}

//-------------------------------------- Function One
function locallink($url){
	switch($url){
		case 'home' ; $hyperlink = "<a href=\"index.php\" title=\"Go to Home\" class=\"tip-bottom\"><i class=\"icon-home\"></i> Home</a>"; break;
		case 'booking' ; $hyperlink = "<a href=\"index.php?task=booking\" title=\"Go to Booking\" >Booking</a>"; break;
		case 'calendar' ; $hyperlink = "<a href=\"index.php?task=calendar\" title=\"Go to calendar\" >View Calendar</a>"; break;
		case 'equipment_all' ; $hyperlink = "<a href=\"index.php?task=equipment_all\" title=\"Go to Equipment Manager\" >Equipment Manager</a>"; break;
		case 'cau_all' ; $hyperlink = "<a href=\"index.php?task=cau_all\" title=\"Go to Condition After Use Manager\" >Condition After Use Manager</a>"; break;
		case 'location_all' ; $hyperlink = "<a href=\"index.php?task=location_all\" title=\"Go to Location Manager\" >Location Manager</a>"; break;
		case 'category_all' ; $hyperlink = "<a href=\"index.php?task=category_all\" title=\"Go to Category Manager\" >Category Manager</a>"; break;
		case 'status_all' ; $hyperlink = "<a href=\"index.php?task=status_all\" title=\"Go to Status Manager\" >Status Manager</a>"; break;
		case 'userall' ; $hyperlink = "<a href=\"index.php?task=userall\" title=\"Go to User Manager\" >User Manager</a>"; break;
		default : $hyperlink = "<a href=\"index.php\" title=\"Go to Home\" class=\"tip-bottom\"><i class=\"icon-home\"></i> Home</a>"; break;
	}
	return $hyperlink;
}

function latest_data($db,$date){
	switch($db){
		case 'user_db' : $fix_field = 'userinsertdate'; break;
		default : $fix_field = 'insertdate'; break;
	}
	$sql_db = "select DATEDIFF(NOW(), ".$fix_field.") as lastdata from $db WHERE userinsertdate = '".date('Y-m-d')."' ";
	$result_db = get_a_line($sql_db);
	$tag = "<span class=\"label label-important\">";
	$tag .= $result_db['lastdata'];
	$tag .= "</span>";
	return $tag;
}

function uid($v){
	$sql = "select userID from user_db where username = '".$v."'";
	$resul = get_a_line($sql);
	return $resul['userID'];
}


function category_name($id){
	$sql_category = "select categoryname from category where categoryid = '$id'";
	$result_category = get_a_line($sql_category);
	return $result_category['categoryname'];
}

function status_name($id){
	$sql_status = "select cauname from condition_after_use where cauid = '$id'";
	$result_status = get_a_line($sql_status);
	return $result_status['cauname'];
}

function statususer($id){
	$sql_status = "select status_name from status_db where status_level = '$id'";
	$result_status = get_a_line($sql_status);
	return $result_status['status_name'];
}

function listdeviceadmin($id){
	$sql = "select name, lastname from user_db where userID = '$id' and approve = '1'";
	$result = get_a_line($sql);
	$deviceadmin = $result['name']." ".$result['lastname'];
	if(trim($deviceadmin)!=''){ $deviceadmin = $deviceadmin; }else{ $deviceadmin = "?"; }//ยังไม่มีการระบุผู้ดูแลอุปกรณ์
	return $deviceadmin;
}
 

function positionTxt($var,$task){
	$sql = "select * from position where position_id = '$var' ";
	$result = get_a_line($sql);
	switch($task){
		case 'id' : $txt = $result['position_idposition_idposition_idposition_idposition_idposition_id'] ; break;
		case 'name' : $txt = $result['position_name'] ; break;
		default : $txt = ""; break;
	}
	return $txt;
}

function titlename($var,$task){
	$sql = "select * from titlename where titlename_id = '$var' ";
	$result = get_a_line($sql);
	switch($task){
		case 'id' : $txt = $result['position_id'] ; break;
		case 'textfull' : $txt = $result['titlename_full'] ; break;
		case 'textshort' : $txt = $result['titlename_short'] ; break;
		default : $txt = ""; break;
	}
	return $txt;
}

function userdetail($id,$ask){
	$sql = "select * from member where memberID = '$id' ";
	$result = get_a_line($sql);

	switch($ask){
		case 'userID' : $txt = $result['memberID'] ; break;
		case 'code': $txt = $result['memberCode']; break;
		case 'namefull' : $txt = $result['memberFirstname']. " ".$result['memberLastname'] ; break;
		case 'memberGenden' : $txt = $result['memberGenden'] ; break;
		case 'memberDateofBirth' : $txt = $result['memberDateofBirth'] ; break;
		case 'memberEmail' : $txt = $result['memberEmail'] ; break;
		case 'memberDateregister' : $txt = $result['memberDateregister'] ; break;
		case 'memberType' : $txt = $result['memberType'] ; break;
		case 'memberTimeStart' : $txt = $result['memberTimeStart'] ; break;
		case 'memberTimeStop' : $txt = $result['memberTimeStop'] ; break;
		default : $txt = ""; break;
	}
	return $txt;
}

function realUser($id){
	$sql = "select memberUsername from member where memberID = '$id' and memberConfirm = '1'";
	$result = get_a_line($sql);
	$deviceadmin = $result['username'];
	if(trim($deviceadmin)!=''){ $deviceadmin = $deviceadmin; }else{ $deviceadmin = "?"; }//ยังไม่มีการระบุผู้ดูแลอุปกรณ์
	return $deviceadmin;
}

function location($i){
	$sql = "select locationname from location where locationid = '".$i."'";
	$resul = get_a_line($sql);
	return $resul['locationname'];
}

//--------------------------------------

function last_detail($item,$task){
    $result_detail = get_a_line("select real_height, real_weight, real_hw_datetime,real_waist,real_hip from real_height_weight where memberID = '$item' order by real_hw_datetime desc limit 1");
    if($task == 'height'){
        $txt = $result_detail['real_height'];
        $txt = round($txt,2);
    }else if($task == 'weight'){
        $txt = $result_detail['real_weight'];
        $txt = round($txt,2);
    }else if($task =='lastdateupd'){
        $txt = $result_detail['real_hw_datetime']; 
        if($result_detail['real_hw_datetime']!=''){
            $txt = date('d M Y, H:i:s', strtotime($txt))." น.";
        }else{
            $txt = "";
        }
        
    }else if($task =='waist'){
        $txt = $result_detail['real_waist']; 
        $txt = round($txt,1);
    }else if($task =='hip'){
        $txt = $result_detail['real_hip']; 
        $txt = round($txt,1);
    } 
    
    return $txt;
}
 
function fixdate_formmat_patter($date){

    if($date !='' || $date !='0000-00-00'){

    $txt = date('Y-m-d',strtotime(str_replace('/','-',$date)));

        }else{

      $txt = '' ; 

    }

    return $txt;

}
function cal_age($dateofb){
    //    $dob = $patient['date_of_brith']." ".$patient['time_of_brith']."";
   $time = date('H:i');
   $dob = fixdate_formmat_patter($dateofb)." $time:00";
   //------------- date of brith on db  end 
    
                                    
    $date_start = date('Y-m-d H:i:s', strtotime($dob));  
    $today = date('Y-m-d H:i:s');
    $date_end =  date('Y-m-d H:i:s', strtotime($today)); //$datetime_coll
                                    
    $dayofyear = 365; 
    $remain=intval(strtotime($date_end)-strtotime($date_start));
    $year=floor($remain/(86400*$dayofyear));
    $month=floor($remain%(86400*$dayofyear)/30/86400);
    //---------------
    $dayfoall = $remain/(86400*$dayofyear); //floor($remain/86400);
    //-----------------
    $wan=floor($remain/86400%30);
    $l_wan=$remain%86400;
    $hour=floor($l_wan/3600);
    $l_hour=$l_wan%3600;
    $minute=floor($l_hour/60);
    $second=$l_hour%60; 
    return $year;
}


function rangbmibg($start,$stop,$x){
    if( $x >= $start || $x >= $stop){
        $bg = "class=\"bg-warning\"";
    }else{
        $bg = "";
    }
    return $bg;
}

function BMR_cal($w,$h,$age,$g){
    switch($g){
        case 'male': $num = 66+(13.7*$w) + (5*$h) - (6.8*$age); break;
        case 'female': $num = 66+(6.9*$w) + (1.8*$h) - (4.7*$age); break;
        default ; $num = ''; break;
    }
    return $num;
}

function idw($h,$g){
  switch($g){
        case 'male': $num = $h-100; break;
        case 'female': $num = $h-110; break;
        default ; $num = ''; break;
    }
    return $num;  
}

function whr_cal($v,$g){
    switch($g){
        case 'male' : 
            if($v<1.0){
                $txt = "<h4 class='text-center text-success'>มีไขมันในระดับร่างกายในระดับปกติ</h4>"; 
            }else if($v>=1.0){
                $txt = "<h4 class='text-center text-warning'>มีความเสี่ยงต่อการเกิดโรคอื่นๆ/โรคติดต่อเรื้อรัง (NCD)</h4>";  
            }else{
                $txt = ""; 
            } break;
        case 'female':
            if($v<0.8){
                $txt = "<h4 class='text-center text-success'>มีไขมันในระดับร่างกายในระดับปกติ</h4>";  
            }else if($v>=0.8){
                $txt = "<h4 class='text-center text-warning'>มีความเสี่ยงต่อการเกิดโรคอื่นๆ/โรคติดต่อเรื้อรัง (NCD)</h4>";    
            }else{
                $txt = ""; 
            } break;
        default : $txt = ""; break; 
    }
    return   $txt;
}

function calfd($val,$qty,$wt){
    $cal = (($val*$qty)*$wt)/100;
    return number_format($cal,2, '.', '');
}

function foodmeal($item){
    $sql_meal = "select * from food_meal where meal_id = '$item'";
    $result_meal = get_a_line($sql_meal); 
    return $result_meal['meal_name'];
}
?>
