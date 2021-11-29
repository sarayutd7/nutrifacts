<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Profile Edit <small>แก้ไขข้อมูลส่วนตัว </small>
                </h3>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>ข้อมูลส่วนตัว<small>***</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="update_profile.php">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?=$result_user_login['memberUsername']?>" readonly>
                                </div>
                            </div>

<!--
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?=$result_user_login['']?>">
                                </div>
                            </div>
-->

                            <hr>
                              
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$result_user_login['memberFirstname']?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" value="<?=$result_user_login['memberLastname']?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="userEmail" name="userEmail" required="required" class="form-control col-md-7 col-xs-12" value="<?=$result_user_login['memberEmail']?>">
                                </div>
                            </div>

                            <hr> 

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Birthday <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 has-feedback">
                                    <input type='date' class="form-control" id="birthday" name="birthday" value="<?=$result_user_login['memberDateofBirth']?>" />
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" <? if($result_user_login['memberGenden']==''){ echo "selected"; }?>>Choose..</option>
                                        <option value="male" <? if($result_user_login['memberGenden']=='male'){ echo "selected"; }?>>Male</option>
                                        <option value="female" <? if($result_user_login['memberGenden']=='female'){ echo "selected"; }?>>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ส่วนสูง <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input type="number" step='0.1' min="-0.0" max="999.9" id="height" name="height" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'height')?>">
                                    <span class="form-control-feedback right" aria-hidden="true">CM</span>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label class="control-label col-xs-12" for="first-name">น้ำหนัก <span class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input type="number" step='0.01' min="-0.01" max="9999.99" id="weight" name="weight" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'weight')?>">
                                    <span class="form-control-feedback right" aria-hidden="true">Kg</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="waist">รอบเอว <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input type="number" step='0.1' min="-0.0" max="999.9" id="waist" name="waist" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'waist')?>">
                                    <span class="form-control-feedback right" aria-hidden="true">CM</span>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label class="control-label col-xs-12" for="hip">รอบสะโพก <span class="required">*</span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input type="number" step='0.01' min="-0.01" max="9999.99" id="hip" name="hip" required="required" class="form-control col-md-3 col-xs-12" value="<?=last_detail($result_user_login['memberID'],'hip')?>">
                                    <span class="form-control-feedback right" aria-hidden="true">CM</span>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="button" class="btn btn-warning">Cancel</button> 
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </form>
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>