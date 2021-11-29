<?php
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//echo $_SESSION['session_user'];
//--------------------------------------

//echo $result_user_login['memberUsername'];
//echo date('Y-m-d H:i:s',strtotime("+30 day"));
//if(!empty($_SESSION['session_user'])){

if(($_SESSION['session_user']!='') && ($result_user_login['memberUsername']==$_SESSION['session_user'])){ ?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('_head.php'); ?>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <style type="text/css">
	body { font-family: 'Kanit', sans-serif; }
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><?php include('txtwebapp.php')?></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php include('profile.php')?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include('sidebar-menu.php'); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include('sidebar-footer.php')?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include('top_nav.php');?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php
		switch($_REQUEST['task']){
            case 'profile' : include('user_edit.php'); break;
			//--------------------------------------------------------
			//--------------------------------------------------------
			//--------------------------------------------------------
            case 'cal': include('cal.php'); break;
			//--------------------------------------------------------
            //--------------------------------------------------------
            case 'form':include('form.php'); break;
            //--------------------------------------------------------
            case 'delete':include('delete.php'); break;
            //--------------------------------------------------------
            case 'viewall':include('viewall.php'); break;
            //--------------------------------------------------------  
                
            //--------------------- MGMT Control ---------------------
            case 'create_foodmeal' : include('create_foodmeal.php'); break;    
            case 'mgmt_foodmeal' : include('mgmt_foodmeal.php'); break;
                case 'mgmt_foodmeal_modify' : include('mgmt_foodmeal_edit.php'); break;
                
            case 'create_foodtype': include('create_foodtype.php'); break;
            case 'mgmt_foodtype' : include('mgmt_foodtype.php'); break;
                case 'mgmt_foodtype_modify' : include('mgmt_foodtype_edit.php'); break; 
            
            case 'create_reference_food': include('create_reference_fd.php'); break;
            case 'mgmt_reference_fd' : include('mgmt_reference_food.php'); break;
                case 'mgmt_referencefood_modify' : include('mgmt_reference_food_edit.php'); break;
            
            case 'create_reference_fm': include('create_reference_fm.php'); break;
            case 'mgmt_reference_fm' : include('mgmt_reference_fm.php'); break;
                case 'mgmt_referencefm_modify' : include('mgmt_reference_fm_edit.php'); break;
                
            case 'create_reference_wt': include('create_reference_wt.php'); break;
            case 'mgmt_reference_wt' : include('mgmt_reference_wt.php'); break;
                case 'mgmt_referencewt_modify' : include('mgmt_reference_wt_edit.php'); break;
                
            case 'create_foodmenu' : include('create_foodmenu.php'); break;
            case 'mgmt_foodmenu' : include('mgmt_foodmenu.php'); break;
            case 'mgmt_foodmenu_modify' : include('mgmt_foodmenu_edit.php'); break;
                
            //--------------------- MGMT Control ---------------------
                
			case 'blank' : include('blank.php'); break;
            case 'main' : include('user_edit.php'); break;
		default : include('user_edit.php'); break;
		}
		?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Design&support by DMU;
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php include('_js.php')?>
		<script type="text/jscript">
			function fnConfirm(txt,url){
				var txtalert = txt;
				if(confirm(txtalert) == true) { window.location = url; }
			}
		</script>
  </body>
</html>
<?php }else{ echo PHPgourl('login.php'); } ?>