<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>จัดการข้อมูล แหล่งอ้างอิงตำรับ/ตำราอาหาร</h3>
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
                        <h2>รายการแหล่งอ้างอิงตำรับ/ตำราอาหารทั้งหมด</h2>
                        <div class="nav navbar-right panel_toolbox">
                           <a href="?task=create_reference_fm" class="btn btn-sm btn-success">สร้างใหม่</a> 
                        </div> 

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
<?
  $sql_reference_fm = "select * from reference_fm order by ref_code asc";
  $result_reference_fm = get_rsltset($sql_reference_fm);
  $nr_reference_fm = count($result_reference_fm);
?>
                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">#</th> 
                                    <th>รายการตำรับ/ตำราอาหาร</th>
                                    <th>Notice</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                               <? for($c=0;$c<$nr_reference_fm;$c++){ $line = ++$line; ?> 
                                <tr>
                                    <td class="text-center"><?=$line?></td> 
                                    <td><?=$result_reference_fm[$c]['reference']?></td>
                                    <td><?=$result_reference_fm[$c]['reference_notice']?></td>
                                    <td class="text-center">
                                    <a href="index.php?task=mgmt_referencefm_modify&item=<?=$result_reference_fm[$c]['ref_code']?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
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
