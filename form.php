<?
if($_GET['objdate']!=''){
    $sql_lefood = "select * from  food_recorder where user_id = '".$result_user_login['memberID']."' and date(collection_date) = '".$_GET['objdate']."' order by time(collection_date) desc";
}else{
    $sql_lefood = "select * from  food_recorder where user_id = '".$result_user_login['memberID']."' and date(collection_date) = '".date('Y-m-d')."' order by time(collection_date) desc";
}

$result_lefood = get_rsltset($sql_lefood);
$nr_lefood = count($result_lefood);

function sum_kcal($uid,$date){
    $sql_lefood = "select sum(cal) as totalKcal from  food_recorder where user_id = '$uid' and date(collection_date) = '$date'";
    $result_lefood = get_a_line($sql_lefood);
    return $result_lefood['totalKcal']; 
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    บันทึกข้อมูลการบริโภคอาหาร <small>รายวัน</small>
                </h3>
            </div>
        </div>

        <div class="clearfix"></div>



        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>ข้อมูลการบริโภคอาหาร</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-modal-lg"><i class="fa fa-plus"></i> เพิ่มรายการอาหาร</button>
                            <button type="button" class="btn btn-sm btn-success" onclick="window.location='index.php?task=viewall'">สรุปภาพรวม</button>
                            <button type="button" class="btn btn-sm btn-info"><?=date("H:i")?></button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="x_content">
                       <form action="" enctype="multipart/form-data" method="get">
                           <div class="row">
                           <input type="hidden" id="task" name="task" value="<?=$_REQUEST['task']?>">
                            <div class="form-group form-horizontal">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 col-xs-12 input-group  text-center">
                                    <input type="date" class="form-control" id="objdate" name="objdate" value="<?=$_GET['objdate']?>">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">เรียกดูข้อมูล</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                       </form>
                        

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th><input type="checkbox" id="check-all" class="flat"></th>
                                        <th>อาหาร</th>
                                        <th class="text-center">จำนวนบริโภค</th>
                                        <th class="text-center">ขนาดหน่วยวัด</th>
                                        <th class="text-center">ชนิดหน่วยวัด</th>

                                        <th class="text-center">น้ำหนักบริโภค</th>
                                        <th class="text-center">พลังงาน</th>
                                        <th class="text-center">สารอาหาร</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? $sum_kcal=0; for($i=0;$i<$nr_lefood;$i++){  ?>
                                    <tr>
                                        <td><input type="checkbox" class="flat" name="table_records"></td>
                                        <td><?=$result_lefood[$i]['f_name']?></td>
                                        <td class="text-center"><?=$result_lefood[$i]['total']?></td>
                                        <td class="text-center"><?=$result_lefood[$i]['qty']?></td>
                                        <td class="text-center"><?=$result_lefood[$i]['unit_name']?></td>

                                        <td class="text-center"><?=$result_lefood[$i]['wt']?> กรัม</td>
                                        <td class="text-center"><?=$result_lefood[$i]['cal']?></td>
                                        <td class="text-center">
                                            <button type="button" title="รายละเอียดคุณค่าทางโภชนาการ" class="btn btn-sm btn-warning" data-whatever='<?=$result_lefood[$i]['f_name']?>|<?=$result_lefood[$i]['f_code']?>|<?=$result_lefood[$i]['qty']?>|<?=$result_lefood[$i]['wt']?>' data-toggle="modal" data-target="#fooddetailBox">
                                                <i class="fa fa-cutlery"></i>
                                            </button>
                                        &nbsp;
                                        <a href="?task=delete&fid=<?=$result_lefood[$i]['f_code']?>&uid=<?=$result_lefood[$i]['user_id']?>" class="btn btn-sm btn-danger" title="ลบข้อมูลนี้">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        </td>
                                    </tr>
                                    <? } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right">พลังงานทั้งหมด</td>
                                        <td class="text-center"><?
                                            if($_GET['objdate']!=''){
                                                $date = $_GET['objdate'];
                                            }else{
                                                $date = date('Y-m-d');
                                            }
                                           echo sum_kcal($result_user_login['memberID'],$date)?></td>
                                        <td class="text-center">Kcal</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!--      bs-modal-lg     -->
                <div class="modal fade bs-modal-lg" id="bs-modal-lg" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">กรุณากรอกข้อมูล</h4>
                            </div>
                            <div class="modal-body">
                                <form action="takeon.php" method="post" enctype="multipart/form-data">
                                    <!--                                -->
                                    <div class="form-group row">
                                        <div class="col-md-12 col-xs-12">
                                            <label class="col-md-4 col-xs-12">วันเวลา</label>
                                            <div class="col-md-4 col-xs-6 form-inline">
                                                <div class="form-group">
                                                    <div class='input-group date' id='myDatepicker'>
                                                        <input type='text' class="form-control" id="dt_eat" name="dt_eat" value="<?=date('d/m/Y')?>" onclick="date_time()" required />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar" onclick="date_time()"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-xs-6 form-inline">
                                                <div class="form-group">
                                                    <div class='input-group time'>
                                                        <input type='time' class="form-control" id="time_eat" name="time_eat" value="<?=date('H:i')?>" required />
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-clock-o"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-xs-12">
                                            <label class="col-md-4 col-xs-12">มืออาหารที่บริโภค</label>
                                            <div class="col-md-8 col-xs-12 form-inline">
                                                <select class="form-control" id="meal" name="meal" required>
                                                    <? $sql_meal = "select * from food_meal order by meal_id asc";
                                            $result_meal = get_rsltset($sql_meal);
                                            $nr_meal = count($result_meal);
                                            if($nr_meal>0){ echo "<option value='0'>กรุณาเลือกข้อมูล</option>"; }
                                            for($m=0;$m<$nr_meal;$m++){ ?>
                                                    <option value="<?=$result_meal[$m]['meal_id']?>"><?=$result_meal[$m]['meal_name']?></option>
                                                    <? } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-xs-12">
                                            <label class="col-md-4 col-xs-12">อาหาร</label>
                                            <div class="col-md-8 col-xs-12">
                                                <input type="text" class="form-control" id="food" name="food" onchange="clearAll()" required>
                                                <input type="hidden" id="foodid" name="foodid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-xs-12">
                                            <label class="col-md-4 col-xs-12">ปริมาณที่บริโภคจริง</label>
                                            <div class="col-md-8 col-xs-12 form-inline">
                                                <input type="number" step='1' min="1" max="9999" required="required" class="form-control" id="qty" name="qty" onchange="nutrifooddt($('#foodid').val(),$(this).val(),$('#unit').val())" required>

                                                <select class="form-control" id="unit" name="unit" onchange="nutrifooddt($('#foodid').val(),$('#qty').val(),$(this).val())" required>
                                                    <option>หน่วยบริโภค</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i>
                                            บันทึก</button>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3 col-xs-3"></div>
                                        <div class="col-md-6 col-xs-6">
                                            <div id="nutridetail" name="nutridetail"></div>
                                        </div>
                                        <div class="col-md-3 col-xs-3"></div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!--     bs-modal-lg      -->

                <!-- bs-detail-lg -->
                <div class="modal fade" id="fooddetailBox" role="dialog" data-keyboard="false" data-backdrop="static" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" id="largeModalLabel"><i class="fa fa-exclamation-circle"></i>&nbsp; //Your modal Title</h4>
                            </div>
                            <div class="modal-body"> 
                               <div class="form-group row">
                                        <div class="col-md-1 col-xs-1"></div>
                                        <div class="col-md-10 col-xs-10">
                                            <div id="nutridetail" name="nutridetail"></div>
                                        </div>
                                        <div class="col-md-1 col-xs-1"></div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- bs-detail-lg -->
            </div>
        </div>
    </div>
</div>