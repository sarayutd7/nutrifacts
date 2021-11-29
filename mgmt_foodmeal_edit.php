<?
$sql_modify = "select * from food_meal where meal_id = '".$_GET['item']."'";
$reault_modify = get_a_line($sql_modify);
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modify Food Mead</h3>
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
                    <form action="mgnt_foodmeal_update.php" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="x_title">
                            <h2>Form Food Mead - <?=$reault_modify['meal_name']?></h2>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" id="item_id" name="item_id" value="<?=$reault_modify['meal_id']?>">
                        <input type="hidden" id="meal_type" name="meal_type" value="<?=$reault_modify['meal_type']?>">
                        <div class="x_content">
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>มื้ออาหาร</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <input class="form-control" type="text" id="food_mead" name="food_mead" value="<?=$reault_modify['meal_name']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>เหตุผลที่แก้ไข</span></div>
                            <div class="col-lg-5 col-sm-9">
                                <input class="form-control" type="text" id="food_notice" name="food_notice" required>
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
