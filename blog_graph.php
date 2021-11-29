<?
function totalCalbetween($user,$type){
    //----------------------------------------
    $sql = "select user_id,sum(cal) as sumCal, sum(prot) as sumProt, sum(fat) as sumFat  from food_recorder where user_id = '$user' and (DATE(collection_date) BETWEEN '".date('Y-m-d',strtotime( "-7 day" ))."' and '".date('Y-m-d')."') "; 
    $result = get_a_line($sql);
    //----------------------------------------
    $sql_last = "select user_id,sum(cal) as sumCal, sum(prot) as sumProt, sum(fat) as sumFat  from food_recorder where user_id = '$user' order by collection_date desc limit 7";
    //----------------------------------------
    switch($type){
        case 'allfat' : 
            if($result['sumFat']==0 || $result['sumFat'] ==""){
                $result_last = get_a_line($sql_last);
                $txt = $result_last['sumFat']."";
            }else{
                $txt = $result['sumFat']."";
            }
            break;
        case 'allprot' :  
            if($result['sumProt']==0 || $result['sumProt'] ==""){
                $result_last = get_a_line($sql_last);
                $txt = $result_last['sumProt']."";
            }else{
                $txt = $result['sumProt']."";
            }
            break;
        case 'allcal' : 
            if($result['sumCal']==0 || $result['sumCal'] ==""){
                $result_last = get_a_line($sql_last);
                $txt = $result_last['sumCal']." Cal";
            }else{
                $txt = $result['sumCal']." Cal";
            } 
            break;
            default : $txt = 0; break;
    }
    
    return $txt;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ตารางพลังงานในอาหารทั้งหมดที่ได้รับ <small>Weekly progress</small></h2>
                <div class="filter">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="demo-container" style="height:280px">
                        <div id="Mygrap" class="demo-placeholder"></div>
                    </div>
                    <div class="tiles">
                        <div class="col-md-4 tile">
                            <span>จำนวนพลังงานทั้งหมดที่ได้รับ</span>
                            <h2><?=totalCalbetween($result_user_login['memberID'], "allcal")?></h2>
<!--
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
-->
                        </div>
                        <div class="col-md-4 tile">
                            <span>จำนวนโปรตีนทั้งหมด</span>
                            <h2><?=totalCalbetween($result_user_login['memberID'], "allprot")?></h2>
<!--
                            <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
-->
                        </div>
                        <div class="col-md-4 tile">
                            <span>จำนวนไขมันทั้งหมด</span>
                            <h2><?=totalCalbetween($result_user_login['memberID'], "allfat")?></h2>
<!--
                            <span class="sparkline11 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                            </span>
-->
                        </div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div>
                        <div class="x_title">
                            <h2>รายการอาหารที่ทาน</h2>
                            <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
  <?
  $sql_mimifood = "select * from food_recorder where user_id = '".$result_user_login['memberID']."' order by collection_date desc limit 7 ";
  $result_minifood = get_rsltset($sql_mimifood);
  $nr_minifood = count($result_minifood);
                            for($boxmini = 0; $boxmini<5; $boxmini++){ 
  ?>
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-cutlery aero"></i>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#"><?=$result_minifood[$boxmini]['f_name']?></a>
                                    <p>ให้พลังงาน <strong><?=$result_minifood[$boxmini]['cal']?></strong></p>
                                    <p><small><?=foodmeal($result_minifood[$boxmini]['meal'])?></small>
                                    </p>
                                </div>
                            </li> 
                            <? } ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>