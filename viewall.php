<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>สรุปภาพรวมรายการอาหาร</h3>
              </div>
 
            </div>

            <div class="clearfix"></div>

            <div class="row">
            
             <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ตารางคุณค่าสารอาหารที่ได้รับ</h2>
                     <?  /* ?><ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      
                       
<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
</li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul><?  */ ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="chartfood" style="height:350px;"></div>

                  </div>
                </div>
              </div>
              
              <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ภาพรวมสรุปรายการอาหาร</h2>
                    <div class="nav navbar-right panel_toolbox">
       <?
          $sql_month = "select year(collection_date) as listYear, MONTH(collection_date) as listMonth, MONTHNAME(collection_date) as listMname from food_recorder 
                        where user_id = '".$result_user_login['memberID']."' 
                        group by year(collection_date), MONTH(collection_date)";
          $result_month = get_rsltset($sql_month);
          $nr_month = count($result_month);
        ?>
                        <select id="item" class="form-control" onchange="document.location.href=this.value">
                          <option value="0">กรุณาเลือกข้อมูล</option>
                           <? for($lm=0;$lm<$nr_month;$lm++){ //?> 
                            <? if($_GET['m']== $result_month[$lm]['listMonth'] && $_GET['y']==$result_month[$lm]['listYear']){ ?>
                            <option value="index.php?task=viewall&m=<?=$result_month[$lm]['listMonth']?>&y=<?=$result_month[$lm]['listYear']?>" selected><?=$result_month[$lm]['listMname']?> <?=$result_month[$lm]['listYear']?></option>
                             <? }else{  ?>
                             <option value="index.php?task=viewall&m=<?=$result_month[$lm]['listMonth']?>&y=<?=$result_month[$lm]['listYear']?>"><?=$result_month[$lm]['listMname']?> <?=$result_month[$lm]['listYear']?></option>
                            <? }
                                                            }?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table table-border">
                          <thead>
                              <tr> 
                                  <th class="text-center">วัน</th>
                                  <th class="text-center">มื้อรับประทาน</th>
                                  <th>รายการอาหาร</th>
                                  <th class="text-center">จำนวน</th>
                                  <th class="text-center">ปริมาณ</th>
                                  <th class="text-center">ไขมันที่ได้</th>
                                  <th class="text-center">โปรตีนที่ได้</th>
                                  <th class="text-center">พลังงานที่ได้รับ</th>
                              </tr>
                          </thead>
                          <?
                          
                          if($_GET['m']!='' && $_GET['y']!=''){
                             $var = "(year(collection_date) = '".$_GET['y']."' and MONTH(collection_date) = '".$_GET['m']."')";
                          }else{
                             $var = "(year(collection_date) = '".date('Y')."' and MONTH(collection_date) = '".date('m')."')"; 
                          }
                          $sql_list = "select * from food_recorder where user_id = '".$result_user_login['memberID']."' and $var order by date(collection_date) asc";
                          $result_list = get_rsltset($sql_list);
                          $nr_list = count($result_list);
                          ?>
                          <tbody>
                          <? for($i=0;$i<$nr_list;$i++){ ?> 
                              <tr>
                                  <td class="text-center"><?=date('d M Y',strtotime($result_list[$i]['collection_date']))?></td>
                                  <td class="text-center"><?=foodmeal($result_list[$i]['meal'])?></td>
                                  <td><?=$result_list[$i]['f_name']?></td>
                                  <td class="text-center"><?=$result_list[$i]['qty']?></td>
                                  <td class="text-center"><?=$result_list[$i]['unit_name']?></td>
                                  <td class="text-center"><?=$result_list[$i]['fat']?></td>
                                  <td class="text-center"><?=$result_list[$i]['prot']?></td>
                                  <td class="text-center"><?=$result_list[$i]['cal']?></td>
                              </tr>
                           <? } ?>
                          </tbody>
                          <?
                          $sql_sumcal = "select sum(cal) as sumcal from food_recorder where user_id = '".$result_user_login['memberID']."' and $var";
                          $result_sumcal = get_a_line($sql_sumcal);
                          ?>
                          <tfoot>
                              <tr>
                                  <td colspan="7" class="text-right">พลังงานทั้งหมด</td>
                                  <td class="text-center"><?=$result_sumcal['sumcal']?></td>
                              </tr>
                          </tfoot>
                      </table>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->