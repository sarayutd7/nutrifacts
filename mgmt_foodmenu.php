<?
function food_type_fn($var){
    $sql = "select type_name from food_type where type_code = '$var'";
    $result = get_a_line($sql);
    return $result['type_name'];
}

function reference_wt_fn($var){
    $sql = "select reference from reference_wt where ref_code = '$var'";
    $result = get_a_line($sql);
    return $result['reference'];
}

function reference_food_fn($var){
    $sql2 = "select reference from reference_fd where ref_code = '$var'";
    $result2 = get_a_line($sql2);
    return $result2['reference'];  
}

function reference_fm_fn($var){
    $sql = "select reference from reference_fm where ref_code = '$var'";
    $result = get_a_line($sql);
    return $result['reference'];  
}
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>จัดการข้อมูล อาหาร</h3>
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
                        <h2>รายการอาหารทั้งหมด</h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="?task=create_foodmenu" class="btn btn-sm btn-success">สร้างใหม่</a>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?
  $sql_foodmenu = "select * from foodmenu order by f_code asc";
  $result_foodmenu = get_rsltset($sql_foodmenu);
  $nr_foodmenu = count($result_foodmenu);
?>
                        <table width="100%" id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th width="20%">Code</th>
                                    <th width="30%">รายการอาหาร</th>
                                    <th width="15%">Food Substitutes</th>
                                    
                                    <!-- Field Reference -->
<!--
                                    <th>Reference WT.</th>
                                    <th>Reference Food</th>
                                    <th>Reference FM.</th>
-->
                                    <!-- Field Reference -->
                                    <th width="10%">Specity Type</th>
                                    <th width="10%">Date Modify</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? for($i=0;$i<$nr_foodmenu;$i++){ $line = ++$line; ?>
                                <tr>
                                    <td class="text-center"><?=$line?></td>
                                    <td><?=food_type_fn($result_foodmenu[$i]['food_type'])?></td>
                                    <td><?=$result_foodmenu[$i]['thai_name']?>
<!--
                                    <small class="byline">
                                       <p class="text-warning"><? //reference_wt_fn($result_foodmenu[$i]['reference_wt'])?></p>
                                       <p class="text-info"><? //reference_food_fn($result_foodmenu[$i]['reference_food'])?></p>
                                    </small>
-->
                                    </td>
                                    <td><?=$result_foodmenu[$i]['food_substitutes']?></td>
                                    <!-- Field Reference -->
<!--
                                    <td class="text-warning">
                                        <label data-toggle="tooltip" 
                                               data-placement="auto" 
                                               title="<? //reference_wt_fn($result_foodmenu[$i]['reference_wt'])?>"> 
                                               <i class="fa fa-book"> </i>&nbsp;Reference
                                        </label>
                                    </td>
                                    <td class="text-info">
                                        <label data-toggle="tooltip" 
                                               data-placement="auto" 
                                               title="<? //reference_food_fn($result_foodmenu[$i]['reference_food'])?>"> 
                                               <i class="fa fa-book"> </i>&nbsp;Reference
                                        </label>
                                    </td>
                                    <td>
                                    <? if($result_foodmenu[$i]['reference_fm']!=''){ ?> 
                                    <label data-toggle="tooltip" 
                                               data-placement="auto" 
                                               title="<? //reference_fm_fn($result_foodmenu[$i]['reference_fm'])?>"> 
                                               <i class="fa fa-book"> </i>&nbsp;Reference
                                    </label>
                                    <? } ?>
                                    </td>
-->
                                    <!-- Field Reference -->
                                    <td><?=$result_foodmenu[$i]['specify_type']?></td>
                                    <td><?=$result_foodmenu[$i]['date_of_modify']?></td>

                                    <td class="text-center">
                                        <a href="index.php?task=mgmt_foodmenu_modify&item=<?=$result_foodmenu[$i]['f_code']?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
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
