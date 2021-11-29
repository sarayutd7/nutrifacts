<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li <?=action_menu('profile', $_REQUEST['task'])?>><a href="index.php?task=profile"><i class="fa fa-male"></i> จัดการข้อมูลส่วนตัว</a></li>
            <li <?=action_menu('cal', $_REQUEST['task'])?>><a href="index.php?task=cal"><i class="fa fa-fire"></i> คำนวณดัชนีต่างๆ</a></li>
            <li <?=action_menu('form', $_REQUEST['task'])?>><a href="index.php?task=form"><i class="fa fa-pencil"></i>บันทึกข้อมูลการรับประทานอาหาร</a></li>
            <? if($result_user_login['memberUsername'] == 'sarayutd7' ||
                  $result_user_login['memberUsername'] == 'wasun' ||
                  $result_user_login['memberUsername'] == 'suthathip'){ ?>
            <? include('menu_control.php');?>
            <? } ?>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</div>
<?
function action_menu($menu,$task){
	if($menu == $task){
		$class_menu = "class=\"active\"";
	}else{
		$class_menu = "";
	}
	return 	$class_menu;
}
?>
