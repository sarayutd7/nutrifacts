<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>จัดการข้อมูล ประเภทมื้ออาหาร</h3>
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
                        <div class="nav navbar-right panel_toolbox">
                           <a href="?task=create_foodmeal" class="btn btn-sm btn-success">สร้างใหม่</a> 
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?
  $sql_food_meal = "select * from food_meal order by meal_id asc";
  $result_food_meal = get_rsltset($sql_food_meal);
  $nr_food_meal = count($result_food_meal);
?>
                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th>
                                    <th>รายการมื้ออาหาร</th>
                                    <th>Notice</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                               <? for($c=0;$c<$nr_food_meal;$c++){ $line = ++$line; ?> 
                                <tr>
                                    <td class="text-center"><?=$line?></td>
                                    <td><?=$result_food_meal[$c]['meal_name']?></td>
                                    <td><?=$result_food_meal[$c]['meal_notice']?></td>
                                    <td class="text-center">
                                    <a href="index.php?task=mgmt_foodmeal_modify&item=<?=$result_food_meal[$c]['meal_id']?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
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
