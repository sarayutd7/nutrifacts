	<!-- jQuery -->
	<script src="library/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="library/bootstrap/dist/js/bootstrap.min.js"></script>
	<? if($_REQUEST['task'] == '' || $_REQUEST['task'] == 'main' || $_REQUEST['task'] =='profile' ){ ?>
	<!-- FastClick -->
	<script src="library/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="library/nprogress/nprogress.js"></script>
	<!-- Chart.js 
	<script src="library/Chart.js/dist/Chart.min.js"></script>-->
	<!-- jQuery Sparklines -->
	<script src="library/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- Flot -->
	<script src="library/Flot/jquery.flot.js"></script>
	<script src="library/Flot/jquery.flot.pie.js"></script>
	<script src="library/Flot/jquery.flot.time.js"></script>
	<script src="library/Flot/jquery.flot.stack.js"></script>
	<script src="library/Flot/jquery.flot.resize.js"></script>
	<!-- Flot plugins -->
	<script src="library/flot.orderbars/js/jquery.flot.orderBars.js"></script>
	<script src="library/flot-spline/js/jquery.flot.spline.min.js"></script>
	<script src="library/flot.curvedlines/curvedLines.js"></script>
	<!-- DateJS -->
	<script src="library/DateJS/build/date.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="library/moment/min/moment.min.js"></script>
	<script src="library/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	 
	<? } ?>

	<? if($_REQUEST['task'] =='form' || $_REQUEST['task']=='mgmt_foodmenu'  ){ ?>
	<script src="library/autocomplete/jquery.autocomplete.js"></script>
	<script src="js/foods.php" type="text/javascript"></script>


	<script src="library/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="library/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="library/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="library/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="library/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="library/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="library/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="library/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="library/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

	<!-- bootstrap-daterangepicker -->
	<script src="library/moment/min/moment.min.js"></script>
	<script src="library/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-datetimepicker -->
	<script src="library/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	<script type="text/javascript">
	    $(function() {
	        $("#food").autocomplete({
	            titleKey: 'label',
	            valueKey: 'label',
	            source: [foods]
	        }).on('selected.xdsoft', function(e, datum) {
	            //alert(datum.id);
	            $('#foodid').val(datum.id);
	            //alert(datum.label);
	            var params = "fcode=" + datum.id;
	            //alert(params);
	            $.ajax({
	                url: 'typeunit.php',
	                type: 'GET',
	                dataType: 'HTML',
	                data: params
	            }).done(function(data) {
	                $("#unit").html(data);
	            });
	            $('#qty').focus();
	        });
	    });

	    function date_time() {
	        $("#dt_eat").datetimepicker({
	            format: 'DD/MM/YYYY',
	            /**/
	            useCurrent: true
	        });
	    }

	    function totime() {
	        $("#time_eat").datetimepicker({
	            format: 'hh:mm A',
	            /**/
	            useCurrent: true
	        });
	    }

	    function datepopup(item) {
	        $("#" + item).datetimepicker({
	            format: 'DD/MM/YYYY',
	            /**/
	            useCurrent: true
	        });
	    }

	    //-------------------
	    function nutrifooddt(f, q, u) {
	        // alert(f+" "+q+" "+u);
	        var vxv = "fid=" + f + "&q=" + q + "&u=" + u;
	        if (u == 0) {
	            $("#unit").focus();
	            $("#nutridetail").empty();
	        } else {
	            $.ajax({
	                url: "nutridetail.php",
	                type: "GET",
	                dataType: "HTML",
	                data: vxv
	            }).done(function(data) {
	                $("#nutridetail").html(data);
	            });
	        }

	    }

	    function clearAll() {
	        $("#qty").val(1);
	        $("#nutridetail").empty();
	    }

	    $("#fooddetailBox").on("shown.bs.modal", function(even) {
	        var button = $(even.relatedTarget) // Button that triggered the modal
	        var recipient = button.data('whatever') // Extract info from data-* attributes
	        var onTfood = recipient.split("|");
	        var vxv = "fid=" + onTfood[1] + "&q=" + onTfood[2] + "&u=" + onTfood[3];

	        $(this).find('#largeModalLabel').text(onTfood[0]);

	        $.ajax({
	            url: "nutridetail.php",
	            type: "GET",
	            dataType: "HTML",
	            data: vxv
	        }).done(function(data) {
	            $("#fooddetailBox").find('#nutridetail').html(data);
	        });
	    });
	</script>
	<? } ?>

    <? if($_REQUEST['task'] == 'viewall'){ ?> 
    <!-- FastClick -->
    <script src="library/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="library/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="library/echarts/dist/echarts.min.js"></script>
    <script src="library/echarts/map/js/world.js"></script>
    <script type="text/javascript">
        
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('chartfood'));

        // specify chart configuration item and data
        
        <? 
        if($_GET['m']!='' && $_GET['y']!=''){
                             $var = "(year(collection_date) = '".$_GET['y']."' and MONTH(collection_date) = '".$_GET['m']."')";
                          }else{
                             $var = "(year(collection_date) = '".date('Y')."' and MONTH(collection_date) = '".date('m')."')"; 
                          }                             
           $sql_chart = "SELECT sum(food_recorder.cal) as sum_cal, sum(food_recorder.prot) as sum_prot, sum(food_recorder.fat) as sum_fat,
                                sum(food_recorder.cho) as sum_cho, sum(food_recorder.na) as sum_na, sum(food_recorder.k) as sum_k,
                                sum(food_recorder.ca) as sum_ca, sum(food_recorder.mg) as sum_mg, sum(food_recorder.p) as sum_p,
                                sum(food_recorder.fe) as sum_fe, sum(food_recorder.cu) as sum_cu, sum(food_recorder.zn) as sum_zn,
                                sum(food_recorder.co) as sum_co, sum(food_recorder.b1) as sum_b1, sum(food_recorder.moist) as sum_moist,
                                sum(food_recorder.fiber) as sum_fiber, sum(food_recorder.choles) as sum_choles, sum(food_recorder.se) as sum_se,
                                sum(food_recorder.gi) as sum_gi,sum(food_recorder.ash) as sum_ash FROM food_recorder
                                where user_id = '".$result_user_login['memberID']."' and $var";
          $result_chart = get_a_line($sql_chart); ?>
        var option = {
            tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/><br/>{b} : {c} ({d}%)"
                },
                legend: {
                    x: "center",
                    y: "bottom",
                    data: ["ไขมันทั้งหมด", "โปรตีน", "คาร์โบไฮเดรตทั้งหมด", "โซเดียม", "โพแทสเซียม","แคลเซียม","แมกนีเซียม","ฟอสฟอรัส","ธาตุเหล็ก","ทองแดง","Zn","Co","วิตามินบี1","Moist","ASH","Fiber","โคเลสเตอรอล","Se","Gi"]
                },
                toolbox: {
                    show: !0,
                    feature: {
                        magicType: {
                            show: !0,
                            type: ["pie", "funnel"],
                            option: {
                                funnel: {
                                    x: "25%",
                                    width: "50%",
                                    funnelAlign: "left",
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: !0,
                            title: "Restore"
                        },
                        saveAsImage: {
                            show: !0,
                            title: "Save Image"
                        }
                    }
                },
                calculable: !0,
                series: [{
                    name: "Food Detail",
                    type: "pie",
                    radius: "55%",
                    center: ["50%", "48%"],
                    data: [{
                        value: <?=$result_chart['sum_fat']?>,
                        name: "ไขมันทั้งหมด"
                    }, {
                        value: <?=$result_chart['sum_prot']?>,
                        name: "โปรตีน"
                    }, {
                        value: <?=$result_chart['sum_cho']?>,
                        name: "คาร์โบไฮเดรตทั้งหมด"
                    }, {
                        value: <?=$result_chart['sum_na']?>,
                        name: "โซเดียม"
                    }, {
                        value: <?=$result_chart['sum_k']?>,
                        name: "โพแทสเซียม"
                    }, {
                        value: <?=$result_chart['sum_ca']?>,
                        name: "แคลเซียม"
                    }, {
                        value: <?=$result_chart['sum_mg']?>,
                        name: "แมกนีเซียม"
                    }, {
                        value: <?=$result_chart['sum_p']?>,
                        name: "ฟอสฟอรัส"
                    }, {
                        value: <?=$result_chart['sum_fe']?>,
                        name: "ธาตุเหล็ก"
                    }, {
                        value: <?=$result_chart['sum_cu']?>,
                        name: "ธาตุทองแดง Cu"
                    }, {
                        value: <?=$result_chart['sum_zn']?>,
                        name: "Zn"
                    }, {
                        value: <?=$result_chart['sum_co']?>,
                        name: "Co"
                    }, {
                        value: <?=$result_chart['sum_b1']?>,
                        name: "วิตามินบี1"
                    }, {
                        value: <?=$result_chart['sum_moist']?>,
                        name: "Moist"
                    }, {
                        value: <?=$result_chart['sum_ash']?>,
                        name: "ASH"
                    }, {
                        value: <?=$result_chart['sum_fiber']?>,
                        name: "Fiber"
                    }, {
                        value: <?=$result_chart['sum_choles']?>,
                        name: "โคเลสเตอรอล"
                    }, {
                        value: <?=$result_chart['sum_se']?>,
                        name: "Se"
                    }, {
                        value: <?=$result_chart['sum_gi']?>,
                        name: "Gi"
                    }]
                }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
    <? } ?>


	<!-- Custom Theme Scripts -->
	<script src="js/custom.min.js"></script>

	<? if($_REQUEST['task'] == 'category_all' ||
		  $_REQUEST['task'] == 'user_all' ||
		  $_REQUEST['task'] == 'titlename_all'){ ?>
	<script src="library/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="library/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="library/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="library/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="library/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="library/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="library/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="library/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="library/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="library/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

	<? } ?>

	<!-- Form Scripts -->
	<? if($_REQUEST['task'] == 'adduser' || $_REQUEST['task'] == 'edituser' ){ ?>
	<script type="text/javascript" src="library/form-validate/jquery.validate.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $("#frm_addUser").validate({
	            rules: {
	                firstname: "required",
	                lastname: "required",
	                username: {
	                    required: true,
	                    minlength: 2
	                },
	                password1: {
	                    required: true,
	                    minlength: 5
	                },
	                password2: {
	                    required: true,
	                    minlength: 5,
	                    equalTo: "#password1"
	                }

	            },
	            messages: {
	                firstname: "Please enter your firstname",
	                lastname: "Please enter your lastname",
	                username: {
	                    required: "Please enter a username",
	                    minlength: "Your username must consist of at least 2 characters"
	                },
	                password1: {
	                    required: "Please provide a password",
	                    minlength: "Your password must be at least 5 characters long"
	                },
	                password2: {
	                    required: "&nbsp;Please provide a password",
	                    minlength: "Your password must be at least 5 characters long",
	                    equalTo: "Please enter the same password as above"
	                }
	            }
	        });
	    });

	    $(document).ready(function() {
	        $("#frm_editUser").validate({
	            rules: {
	                firstname: "required",
	                lastname: "required"
	            },
	            messages: {
	                firstname: "Please enter your firstname",
	                lastname: "Please enter your lastname"
	            }
	        });
	    });
	</script>

	<? } ?>

	<? if($_REQUEST['task'] == 'addarticle'){ ?>
	<!-- bootstrap-wysiwyg -->
	<script src="library/bootstrap-ckeditor/ckeditor.js"></script>
	<script src="library/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="library/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="library/bootstrap-tags/js/bootstrap-tagsinput.js"></script>
	<script src="library/bootstrap-tags/js/typeahead.bundle.min.js"></script>

	<!-- Dropzone.js -->
	<?php 
    $Imadirectory = "images/post/";
    $image = glob($Imadirectory."*"); ?>
	<script src="library/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script>
	    //--------------------------------
	    CKEDITOR.replace('content', {
	        fullPage: false,
	        allowedContent: true,
	        height: 320
	    });
	    //------------------------------
	    /**/
	    $('#tagsItem').tagsinput({
	        tagClass: 'big',
	    });

	    //------------------------------
	    $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
	        if (e.keyCode == 13) {
	            e.preventDefault();
	            return false;
	        }
	    });
	    //------------------------------



	    $("#file-img-upload").fileinput({
	        language: "th",
	        uploadUrl: "upload.php",
	        uploadAsync: false,
	        showUpload: false, // hide upload button
	        showRemove: false, // hide remove button 
	        minFileCount: 1,
	        maxFileCount: 5,
	        /*initialPreview: [url1, url2],*/
	        initialPreviewAsData: true,

	        /*initialPreviewConfig: [
            {caption: "Moon.jpg", downloadUrl: url1, size: 930321, width: "120px", key: 1},
            {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
        ],
        deleteUrl: "images/post/",
        overwriteInitial: false,
        maxFileSize: 100,
        initialCaption: "The Moon and the Earth",*/

	        append: true

	    }).on("filebatchselected", function(event, files) {
	        $("#file-img-upload").fileinput("upload");
	    });
	    $("#file-img-upload").on("filepredelete", function(event, key, url) {
	        alert(url);
	        /*var abort = true;
	        if (confirm("Are you sure you want to delete this image?")) {
	            abort = false;
	        }
	        return abort;*/

	    });
	</script>

	<? } ?>

	<script>
	    function cal(act, bmi) {
	        var sum;
	        sum = act * bmi;
	        var obj = "<div class=\"tile-stats\"><h5 class=\"text-center text-success\">พลังงานที่คุณใช้ในแต่ละวัน</h5><div class=\"count text-center\">" + sum.toFixed(2) + " <label class=\"text-center\"> Kcal</label></div></div>";
	        $('#tdee_num').html(obj);
	    }
	</script>