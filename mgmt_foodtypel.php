<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>จัดการข้อมูล ประเภทอาหาร</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>รายการประเภทมื้ออาหารทั้งหมด</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?
  $sql_food_type = "select * from food_type order by meal_id asc";
  $result_food_type = get_rsltset($sql_food_type);
  $nr_food_type = count($result_food_type);
?>
                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th>Code</th>
                                    <th>รายการอาหาร</th>
                                    <th>Notice</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                               <? for($c=0;$c<$nr_food_type;$c++){ $line = ++$line; ?> 
                                <tr>
                                    <td class="text-center"><?=$line?></td>
                                    <td><?=$result_food_type[$c]['type_code']?></td>
                                    <td><?=$result_food_type[$c]['type_name']?></td>
                                    <td><?=$result_food_type[$c]['type_notice']?></td>
                                    <td class="text-center">
                                    <a href="index.php?task=mgmt_foodtype_modify&item=<?=$result_food_type[$c]['type_code']?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
                                    </td>
                                </tr>
                                <? }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
