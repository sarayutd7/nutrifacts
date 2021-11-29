<?
include('conn/function.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>




    <!-- Bootstrap -->
    <link href="library/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="library/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">


    <!-- bootstrap-datetimepicker -->
    <link href="library/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- fix set color datepicker use this one page -->
    <style type="text/css">
    .datepicker {
    background-color: #fff ;
    color: #333 ;
    }
    </style>
    <!-- fix set color datepicker -->
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="check_login.php" method="post" enctype="multipart/form-data" id="loginForm">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" id="username" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="password" name="password"/>
              </div>

              <div>
                <button type="submit" class="btn btn-round btn-success">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
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
        </div>

        <div id="register" class="animate form registration_form bg_info">
          <?php include('frm_regis.php')?>
        </div>
      </div>
    </div>
  </body>
    <!-- jQuery -->
    <script src="library/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="library/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="library/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="library/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script>
    $('#calendar').datetimepicker( { format: 'DD/MM/YYYY' } );
	</script>
</html>
