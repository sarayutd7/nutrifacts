<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li <?=action_menu('user_all', $_REQUEST['task'])?>><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                  <li ><a><i class="fa fa-edit"></i> จัดการข้อมูลบทความ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="active"><a href="index.php?task=category_all">ประเภทบทความ</a></li>
                      <li><a href="index.php?task=tag_all">Tag บทความ</a></li>
                      <li><a href="index.php?task=addarticle">บทความใหม่</a></li>
                    </ul>
                  </li>
                  
                  
                  <li><a><i class="fa fa-comments"></i> จัดการข้อความตอลกล้บ</a></li>
                  <li><a><i class="fa fa-clone"></i>จัดเรียงเนื้อหาบทความ</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>บริหารจัดการ</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> จัดการข้อมูลผู้ใช้งาน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">จัดการข้อมุลผู้ใช้งาน</a></li>
                    </ul>
                  </li>
                  <li ><a href="#"><i class="fa fa-desktop"></i> จัดการข้อมูลระบบ <span class="fa fa-chevron-down"></span></a>
                  	<ul class="nav child_menu">
                      <li <?=action_menu('titlename_all', $_REQUEST['task'])?>><a href="index.php?task=titlename_all">จัดการข้อมูลคำนำหน้าชื่อ</a></li>
                      <li <?=action_menu('user_all', $_REQUEST['task'])?>><a href="index.php?task=user_all">ข้อมูลผู้ควบคุมระบบ</a></li>
                      <li <?=action_menu('status_all', $_REQUEST['task'])?>><a href="index.php?task=status_all">ข้อมูลสิทธิ์การเข้าใช้งาน</a></li>
                    </ul>
                  </li>
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