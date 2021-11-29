<?
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_unit = "select * from food_weight where f_code = ".$_REQUEST['fcode']." order by item_no asc";
$result_unit = get_rsltset($sql_unit);
$nr_unit = count($result_unit);
$numU = 1;

//------------------
function qty($item){
    if($item=="1"){
        $txtq = "";
    }else{
        $txtq = $item; //"("..")";  
    }
    return $txtq;
}
//-------------------
?>
<option value="0">กรุณาเลือกข้อมูล</option>
<? for($u=0;$u<$nr_unit;$u++){  /*++$numU;*/?>  
<option value="<?=$result_unit[$u]['wt']?>"><?=qty($result_unit[$u]['qty'])?> <?=$result_unit[$u]['unit_name']?> ขนาด <?=$result_unit[$u]['wt']?> g</option>
<?  } ?> 