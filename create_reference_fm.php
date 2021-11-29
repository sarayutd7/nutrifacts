<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Reference Food Menu</h3>
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
                    <form action="mgnt_reference_fm_add.php" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="x_title">
                            <h2>Form Create Reference Food Menu </h2>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" id="item_id" name="item_id" value="<?=$reault_modify['ref_code']?>">
                        <input type="hidden" id="reference_status" name="reference_status" value="2">
                        <div class="x_content">
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>ชื่อแหล่งอ้างอิง</span></div>
                                <div class="col-lg-5 col-sm-9">
                                    <input class="form-control" type="text" id="reference" name="reference" value="<?=$reault_modify['reference']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-1 col-lg-offset-4 col-sm-3"><span>เหตุผลที่แก้ไข</span></div>
                            <div class="col-lg-5 col-sm-9">
                                <input class="form-control" type="text" id="reference_notice" name="reference_notice" value="<?=$reault_modify['reference_notice']?>" required>
                            </div>
                            </div>

                        </div> 
                        <div class="form-group row text-center">
                            <button class="btn btn-md btn-success" type="submit">Save</button>
                            <button class="btn btn-md btn-danger" type="reset">Reset</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
