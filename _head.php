    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nutrifacts 4.0 - Control Panel</title>
	
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="library/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="library/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="library/nprogress/nprogress.css" rel="stylesheet">
    <? if($_REQUEST['task'] == '' or $_REQUEST['task'] =='main' || $_REQUEST['task'] =='profile' ){ ?>
    <!-- iCheck -->
    <link href="library/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="library/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="library/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="library/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> 
    <!-- bootstrap-datetimepicker -->
    <link href="library/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<? } ?>
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <? if($_REQUEST['task'] == 'category_all' ||
		  $_REQUEST['task'] == 'user_all'	||
         $_REQUEST['task'] == 'mgmt_foodmeal'){ ?>
    <!-- iCheck -->
    <link href="library/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="library/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <? } ?>
    
    <? if($_REQUEST['task'] =='form' ||$_REQUEST['task']=='mgmt_foodmenu' ){ ?>
    <link href="library/autocomplete/jquery.autocomplete.css" rel="stylesheet">
    
    <!-- Datatables -->
    <link href="library/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="library/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- bootstrap-daterangepicker -->
    <link href="library/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> 
    <!-- bootstrap-datetimepicker -->
    <link href="library/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <? } ?>
    