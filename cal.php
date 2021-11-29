<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    คำนวณ BMI <small>อัตราการเผาผลาญพลังงานในแต่ละวัน</small>
                </h3>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>BMR<small>Basal Metabolic Rate</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#">
                            <!-- content starts here -->
                            <div class="form-group">
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon">
                                            <? if($result_user_login['memberGenden']=='male'){ ?> <i class="fa fa-male"></i>
                                            <? }elseif($result_user_login['memberGenden']=='famale'){ ?> <i class="fa fa-female"></i>
                                            <? }else{ ?> <i class="fa fa-user"></i>
                                            <? } ?>
                                        </div>
                                        <div class="count">
                                            <?=strtoupper($result_user_login['memberGenden'])?>
                                        </div>
                                        <h3>Gender</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="glyphicon glyphicon-dashboard"></i></div>
                                        <div class="count">
                                            <?=last_detail($result_user_login['memberID'],'weight')?> Kg.</div>
                                        <h3>Weight</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-arrows-v"></i></div>
                                        <div class="count">
                                            <?=last_detail($result_user_login['memberID'],'height')?> Cm.</div>
                                        <h3>Height</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-birthday-cake"></i></div>
                                        <div class="count">
                                            <?=cal_age($result_user_login['memberDateofBirth'])?>
                                        </div>
                                        <h3>Age</h3>
                                    </div>
                                </div>
                                <p>Last Update :
                                    <?=last_detail($result_user_login['memberID'],'lastdateupd')?>
                                </p>
                            </div>




                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-4 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>ดัชนีมวลกาย (BMI) ของคุณ</h3>
                                            <span>Body Mass Index</span>
                                        </div>
                                        <div class="x_content">
                                            <div class="tile">
                                                <h1 class="text-center text-warning">
                                                    <?   
                                                    $height = last_detail($result_user_login['memberID'],'height');
                                                    $weight = last_detail($result_user_login['memberID'],'weight');
                                                    /* --------- */
                                                    $height = number_format($height);
                                                    $weight = number_format($weight,2,',','');
                                            /* --------------------------------------------------------- */
                                                    /*$h = ($height/100);
                                                    $bmi = $weight  /  (pow($h,2) );
                                                    $bmi = number_format($bmi, 2, '.', '');
                                                    echo $bmi;  */
                                            if($height>0 && $weight >0){
                                                $h = ($height/100);
                                                    $bmi = $weight  /  (pow($h,2) );
                                                    $bmi = number_format($bmi, 2, '.', '');
                                                    echo $bmi; 
                                            }else{
                                                echo 0;
                                            }
                                                    ?>
                                                </h1>
                                            </div>
                                            <div>
                                                <h4 class="text-success">ประเมินดัชนีมวลกายมาตรฐานคนเอเชีย</h4>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>BMI</th>
                                                            <th>เกณฑ์</th>
                                                            <th>ภาวะเสี่ยง</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr <? if($bmi<=18.5){ "class=\" bg-warning\""; }?> >
                                                            <td> &lt; 18.5 </td>
                                                            <td>ผอม </td>
                                                            <td>โรคขาดสารอาหาร</td>
                                                        </tr>
                                                        <tr <?=rangbmibg(18.5,22.9,$bmi)?>>
                                                            <td>18.5 - 22.9</td>
                                                            <td>สมส่วน </td>
                                                            <td>-</td>
                                                        </tr>
                                                        <tr <?=rangbmibg(23,24.9,$bmi)?>>
                                                            <td>23.0 - 24.9</td>
                                                            <td>ท้วม </td>
                                                            <td>มีโอกาศเกิดโรคความดัน เบาหวานสูง<br>ควรคุมอาหาร<br>และออกกำลังกาย</td>
                                                        </tr>
                                                        <tr <?=rangbmibg(25,29.9,$bmi)?>>
                                                            <td>25.0 - 29.9</td>
                                                            <td>อ้วน </td>
                                                            <td>เสี่ยงต่อการเกิดโรคที่มากับความอ้วน<br>ควรคุมอาหาร<br>และออกกำลังกายอย่างจริงจัง</td>
                                                        </tr>
                                                        <tr <? if($bmi>=30){ "class=\"bg-warning\""; }?>>
                                                            <td>&#x02267; 30.0 </td>
                                                            <td>อ้วนมาก, อันตราย </td>
                                                            <td>เสี่ยงต่อการเกิดโรคที่มากับความอ้วน<br>ควรคุมอาหาร<br>และออกกำลังกายอย่างจริงจัง</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>อัตราการเผาผลาญพลังงานในแต่ละวัน ของคุณ</h3>
                                            <span>Basal Metabolic Rate</span>
                                        </div>
                                        <div class="x_content">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-fire"></i></div>
                                                <div class="count text-center text-warning">
                                                    <?   
                                   /*$bmr_num = BMR_cal(last_detail($result_user_login['memberID'],'weight'),last_detail($result_user_login['memberID'],'height'),cal_age($result_user_login['memberDateofBirth']),$result_user_login['memberGenden']);  
                                                   echo $bmr_num; */
                                    if($weight > 0 && $height>0){
                                       $bmr_num = BMR_cal($weight,$height,cal_age($result_user_login['memberDateofBirth']),$result_user_login['memberGenden']);  
                                       echo $bmr_num; 
                                    }else{
                                        echo 0;
                                    }
                                                    ?>
                                                </div>
                                                <h3 class="text-center">Kcal</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TDEE -->
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>อัตราการเผาพลาญพลังงานที่คุณใช้ในแต่ละวัน </h3>
                                            <span>TDEE (Total Daily Energy Expenditure)</span>
                                        </div>
                                        <div class="x_content">
                                            <div class="form-group">
                                                <div class="col-md-12 col-xs-12">
                                                    <h4>กรุณาเลือกกิจกรรม</h4>
                                                </div>
                                                <div class="col-md-12 col-xs-12">
                                                    <select class="form-control" id="activity" name="activity" onchange="cal(this.value,'<?=$bmr_num?>')">
                                                        <option value="0">กรุณาเลือกกิจกรรม</option>
                                                        <option value="1.2">ไม่ออกกำลังกายหรือออกกำลังกายน้อยมาก</option>
                                                        <option value="1.375">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
                                                        <option value="1.55">ออกกำลังกายน้อยเล่นกีฬา 3-5 วัน/สัปดาห์</option>
                                                        <option value="1.725">ออกกำลังกายน้อยเล่นกีฬา 6-7 วัน/สัปดาห์</option>
                                                        <option value="1.9">ออกกำลังกายหนักมากเป็นนักกีฬา</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="tdee_num">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>คำนวณน้ำหนักมาตราฐานของคุณ</h3>
                                            <span>Ideal weight calculator</span>
                                        </div>
                                        <div class="x_content">
                                            <div class="tile-stats">
                                                <h5 class="text-center">น้ำหนักมาตราฐานของคุณ</h5>
                                                <h1 class="text-center text-warning">
                                                    <?
//                                                if($result_user_login['memberGenden']=='male'){  
//                                                    $iwc_limit = 7;
//                                                    $low_IBW = ((last_detail($result_user_login['memberID'],'height')-100)*0.90)-$iwc_limit;       
//                                                    $height_IBW = (last_detail($result_user_login['memberID'],'height')-100)*0.90;                   
//                                                }else{ $iwc_limit = 10; 
//                                                     $low_IBW = ((last_detail($result_user_login['memberID'],'height')-100)*0.85)-$iwc_limit;       
//                                                     $height_IBW = (last_detail($result_user_login['memberID'],'height')-100)*0.85 ; 
//                                                     }
//                                                  //$low_IBW." - ".
//                                                  echo $height_IBW;
    if($height>0){  echo idw(last_detail($result_user_login['memberID'],'height'),$result_user_login['memberGenden']);
                                }else{ echo 0; }
                                               ?> Kg.
                                                </h1>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h3>คำนวณสัดส่วนรอบเอวต่อสะโพก</h3>
                                            <span>Waist Hip Ratio</span>
                                        </div>
                                        <div class="x_content">
                                            <!--
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="waist">รอบเอว</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12 has-feedback">
                                                    <input type="number" step='0.1' min="-0.0" max="999.9" id="waist" name="waist" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'waist')?>">
                                                    <span class="form-control-feedback right" aria-hidden="true">CM</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="hip">รอบสะโพก</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12 has-feedback">
                                                    <input type="number" step='0.1' min="-0.0" max="999.9" id="hip" name="hip" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'hip')?>">
                                                    <span class="form-control-feedback right" aria-hidden="true">CM</span>
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>-->
                                            <div class="tile-stats">
                                                <h5 class="text-center">คำนวณสัดส่วนรอบเอวต่อสะโพก คือ</h5>
                                                <h1 class="text-center text-warning">
                                                    <? 
    $waist = last_detail($result_user_login['memberID'],'waist');
    $hip = last_detail($result_user_login['memberID'],'hip');

    
    if($waist>0 && $hip >0 ){ $whr = $waist / $hip; 
                              $whr= round($whr,2); 
                            }else{ $whr =0; } echo $whr;
                                                    
                                                    ?>
                                                </h1>
                                                
                                                <?=whr_cal($whr,$result_user_login['memberGenden'])?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 ">

                                </div>
                                <div class="col-md-4"></div>
                            </div>

                        </form>
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>