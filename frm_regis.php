<section class="login_content ">
            <form action="regismember.php" enctype="multipart/form-data" method="post" id="frmRegis">
              <h1>Create Account</h1>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" class="form-control" placeholder="Username" required="" id="username" name="username" required/>
                <input type="hidden" id="ip" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" id="code" name="code" value="<?php echo random_id(13);?>">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="email" class="form-control" placeholder="Email" required="" id="email" name="email" required/>
              </div  >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="password" class="form-control" placeholder="Password" required="" id="password" name="password" required/>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="password" class="form-control" placeholder="Confirm Password" required="" id="cf_password" name="cf_password" required/>
              </div>
              
              <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="control-group  ">
                     <div class="controls">
                           <div class="xdisplay_inputx form-group ">
                                <input type="text" class="form-control has-feedback-left" id="calendar" name="calendar" placeholder="DD/MM/YYYY" required>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                           </div>
                     </div>
                </div>   
              </div>
              
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="gender" class="btn-group" data-toggle="buttons">
                         <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" id="gender" name="gender" value="male" required> &nbsp; Male &nbsp;
                         </label>
                         <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" id="gender" name="gender" value="female" required> Female
                         </label>
                  </div>
              </div> 
              <div class="col-md-12 col-sm-12 col-xs-12"> &nbsp; </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-default submit btn-info" value="Submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a  href="#signin" class="to_register "> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><?php include('txtwebapp.php')?></h1>
                  <p>&copy;2018 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>