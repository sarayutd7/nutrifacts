<? ob_start();
session_start();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <? include('_head.php'); ?>
     
</head>

<body>

 <?
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//-------------------------------
$meal = $_REQUEST['meal'];
$food = $_REQUEST['foodid'];
$qty = $_REQUEST['qty'];
$unit = $_REQUEST['unit'];

//-------------------------------

$sql_food = "SELECT * FROM `foodmenu` WHERE `f_code` = '".$food."'";
$result_food = get_a_line($sql_food);

//-----------------------------------------------------------------------------

$sql_unit = "select * from food_weight where f_code = '".$food."' and wt = '".$unit."' ";
$result_unit = get_a_line($sql_unit);
//-------------------------------------------------------------------------------

$exp_datetime = explode(" ",$_REQUEST['dt_eat']);
$datetime = fixdate_formmat_patter($exp_datetime[0]);
$time = date('H:i',strtotime($_REQUEST['time_eat']));
//-------------------------------------------------------------------------------
    
$insert = "insert into food_recorder set user_id = '".$result_user_login['memberID']."', f_code = '".$food."',
                                         f_name = '".$result_food['thai_name']."',
                                         collection_date  = '".$datetime." $time',
                                         meal = '".$meal."',
                                         item_no = '".$result_unit['item_no']."',
                                         unit_name = '".$result_unit['unit_name']."',
                                         unit_size = '".$result_unit['unit_size']."',
                                         unit_wt = '".$result_unit['unit_wt']."',
                                         unit_brand = '".$result_unit['unit_brand']."',
                                         total = '$qty',
                                         qty = '".$result_unit['qty']."',
                                         wt = '".$unit."',
                                         cal = '".calfd($result_food['cal'],$qty,$unit)."',
                                         prot = '".calfd($result_food['prot'],$qty,$unit)."',
                                         fat = '".calfd($result_food['fat'],$qty,$unit)."',
                                         cho = '".calfd($result_food['cho'],$qty,$unit)."',
                                         na = '".calfd($result_food['na'],$qty,$unit)."',
                                         k = '".calfd($result_food['k'],$qty,$unit)."',
                                         ca = '".calfd($result_food['ca'],$qty,$unit)."',
                                         mg = '".calfd($result_food['mg'],$qty,$unit)."',
                                         p = '".calfd($result_food['p'],$qty,$unit)."',
                                         fe  = '".calfd($result_food['fe'],$qty,$unit)."',
                                         cu  = '".calfd($result_food['cu'],$qty,$unit)."',
                                         zn = '".calfd($result_food['zn'],$qty,$unit)."',
                                         co  = '".calfd($result_food['co'],$qty,$unit)."',
                                         b1 = '".calfd($result_food['bl'],$qty,$unit)."',
                                         moist = '".calfd($result_food['moist'],$qty,$unit)."',
                                         ash = '".calfd($result_food['ash'],$qty,$unit)."',
                                         fiber = '".calfd($result_food['fiber'],$qty,$unit)."',
                                         choles = '".calfd($result_food['choles'],$qty,$unit)."',
                                         se  = '".calfd($result_food['se'],$qty,$unit)."',
                                         serving = '".calfd($result_food['serving'],$qty,$unit)."',
                                         gi = '".calfd($result_food['gi'],$qty,$unit)."'  "; 

insert_data($insert);
echo PHPgourl('index.php?task=form');
?>

</body>
</html>