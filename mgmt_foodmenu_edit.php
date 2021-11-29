<?
$sql_modify = "select * from foodmenu where f_code = '".$_GET['item']."'";
$reault_modify = get_a_line($sql_modify);
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modify Food Menu</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form action="mgnt_foodmenu_update.php" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="x_title">
                            <h2>Form Food Menu - <?=$reault_modify['thai_name']?></h2>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" id="item_id" name="item_id" value="<?=$reault_modify['f_code']?>">
                        <input type="hidden" id="type_status" name="type_status" value="<?=$reault_modify['type_status']?>">
                        <div class="x_content">
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>ประเภทอาหาร</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <?
    $sql_food_type = "select * from food_type order by type_code asc";
    $result_food_type = get_rsltset($sql_food_type);
    $nr_food_type = count($result_food_type);
    ?>
                                    <select class="form-control" id="food_type" name="food_type" required>
                                        <? for($ft=0;$ft<$nr_food_type;$ft++){ ?>
                                        <? if($result_food_type[$ft]['type_code']==$reault_modify['food_type']){ ?>
                                        <option value="<?=$result_food_type[$ft]['type_code']?>" selected><?=$result_food_type[$ft]['type_name']?></option>
                                        <? }else{ ?>
                                        <option value="<?=$result_food_type[$ft]['type_code']?>"><?=$result_food_type[$ft]['type_name']?></option>
                                        <? } ?>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>ชื่ออาหาร</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <input class="form-control" type="text" id="thai_name" name="thai_name" value="<?=$reault_modify['thai_name']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>ชื่ออาหาร (ย่อย)</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <input class="form-control" type="text" id="food_substitutes" name="food_substitutes" value="<?=$reault_modify['food_substitutes']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <h4>สารอาหาร ทั้งหมด</h4>
                            </div>
                            <!-- สารอาหาร -->
                            <div class="form-group row">
                                <?
    $nutrient = array('cal','prot','fat','cho','na','k','ca','mg','p','fe','cu','mn','zn','co','b1','moist','ash','fiber','choles','se','serving','gi');
    for($n=0;$n<count($nutrient);$n++){ ?>
                                <div class="col-lg-2 col-md-3 form-group has-feedback">
                                    <input class="form-control has-feedback-left" type="number" id="<?=$nutrient[$n]?>" name="<?=$nutrient[$n]?>" value="<?=$reault_modify[$nutrient[$n]]?>" required>
                                    <span class="form-control-feedback left" aria-hidden="true">
                                        <sma><?=$nutrient[$n]?></sma>
                                    </span>
                                </div>
                                <?   }     ?>
                            </div>
                            <!-- สารอาหาร -->
                            <hr>
                            <div class="form-group row">
                                <h4>แหล่งอ้างอิง ข้อมูล</h4>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2 col-lg-offset-3 col-sm-5"><span>แหล่งอ้างอิง ปริมาณอาหาร.</span></div>
                                <div class="col-lg-5 col-sm-7">
                                    <?
    $sql_food_wt = "select * from reference_wt order by ref_code asc";
    $result_food_wt = get_rsltset($sql_food_wt);
    $nr_food_wt = count($result_food_wt);
    ?>
                                    <select class="form-control" id="reference_wt" name="reference_wt" required>
                                        <? for($fwt=0;$fwt<$nr_food_wt;$fwt++){ ?>
                                        <? if($result_food_wt[$fwt]['ref_code']==$reault_modify['reference_wt']){ ?>
                                        <option value="<?=$result_food_wt[$fwt]['type_code']?>" selected><?=$result_food_wt[$fwt]['reference']?></option>
                                        <? }else{ ?>
                                        <option value="<?=$result_food_wt[$fwt]['type_code']?>"><?=$result_food_wt[$fwt]['reference']?></option>
                                        <? } ?>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2 col-lg-offset-3 col-sm-5"><span>แหล่งอ้างอิงคุณค่าทางสารอาหาร.</span></div>
                                <div class="col-lg-5 col-sm-7">
                                    <?
    $sql_food_fd = "select * from reference_fd order by ref_code asc";
    $result_food_fd = get_rsltset($sql_food_fd);
    $nr_food_fd = count($result_food_fd);
    ?>
                                    <select class="form-control" id="reference_food" name="reference_food" required>
                                        <? for($rfd=0;$rfd<$nr_food_fd;$rfd++){ ?>
                                        <? if($result_food_fd[$rfd]['ref_code']==$reault_modify['reference_food']){ ?>
                                        <option value="<?=$result_food_fd[$rfd]['type_code']?>" selected><?=$result_food_fd[$rfd]['reference']?></option>
                                        <? }else{ ?>
                                        <option value="<?=$result_food_fd[$rfd]['type_code']?>"><?=$result_food_fd[$rfd]['reference']?></option>
                                        <? } ?>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2 col-lg-offset-3 col-sm-5"><span>แหล่งอ้างอิง ตำรับ.</span></div>
                                <div class="col-lg-5 col-sm-7">
                                    <?
    $sql_food_fm = "select * from reference_fm order by ref_code asc";
    $result_food_fm = get_rsltset($sql_food_fm);
    $nr_food_fm = count($result_food_fm);
    ?>
                                    <select class="form-control" id="reference_food" name="reference_food">
                                        <? for($rfm=0;$rfm<$nr_food_fm;$rfm++){ ?>
                                        <? if($result_food_fm[$rfd]['ref_code']==$reault_modify['reference_fm']){ ?>
                                        <option value="<?=$result_food_fm[$rfm]['type_code']?>" selected><?=$result_food_fm[$rfm]['reference']?></option>
                                        <? }else{ ?>
                                        <option value="<?=$result_food_fm[$rfm]['type_code']?>"><?=$result_food_fm[$rfm]['reference']?></option>
                                        <? } ?>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>เหตุผลที่แก้ไข</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <input class="form-control" type="text" id="type_notice" name="type_notice" value="<?=$reault_modify['type_notice']?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row text-center">
                            <button class="btn btn-md btn-success" type="submit">Edit</button>
                            <button class="btn btn-md btn-danger" type="reset">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
