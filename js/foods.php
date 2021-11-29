<?
include('../conn/config.php');
include('../conn/function.inc.php');
db_connect();
$sql_food = "select * from foodmenu order by thai_name asc";
$result_food = get_rsltset($sql_food);
$nr_food = count($result_food);
$numf = 1;
?>
 
 
    var foods = [
    <? for($f=1;$f<$nr_food;$f++){ ++$numf; ?> 
    <? if($numf<$nr_food){ ?>
    {
    id :"<?=$result_food[$f]['f_code']?>",
    label :"<?=$result_food[$f]['thai_name']?>"
    },
    <? }else{ ?>
    { 
    id :"<?=$result_food[$f]['f_code']?>",
    label :"<?=$result_food[$f]['thai_name']?>"
    }
    <? } ?> 
<?  } ?>]; 