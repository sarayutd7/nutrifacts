<?
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_food = "SELECT * FROM `foodmenu` WHERE `f_code` = '".$_REQUEST['fid']."'";
$result_food = get_a_line($sql_food);


?>
<div class="row">
    <div class="col-md-12 col-xs-12">

        <div class="row">
            <table width="100%">
                <tr>
                    <td>
                        <h1 class="text-center">ข้อมูลโภชนาการ</h1>
                        <div class="clearfix"></div>
                        <h6>หนึ่งหน่วยบริโภค <?=$_REQUEST['u']*$_REQUEST['q']?> g</h6>
                    </td>
                <tr>
                    <td bgcolor="#000000" height="5px"></td>
                </tr>
                <tr>
                    <td><label>คุณค่าทางโภชนาการต่อหนึ่งหน่วยบริโภค</label></td>
                </tr>
                <tr>
                    <td>
                        <label class="col-md-6 col-xs-6 text-left">พลังงานทั้งหมด <?=calfd($result_food['cal'],$_REQUEST['q'],$_REQUEST['u'])?></label>
                        <label class="col-md-6 col-xs-6 text-right">พลังงานจากไขมัน 2</label>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#000000" height="2px"></td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-6 col-xs-6"><label>&nbsp;</label></div>
                        <div class="col-md-6 col-xs-6 text-right"><label>% ของปริมาณที่แนะนำต่อวัน*</label></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table class="table" width="100%">
                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Fat</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['fat'],$_REQUEST['q'],$_REQUEST['u'])?> g</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Prot</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['prot'],$_REQUEST['q'],$_REQUEST['u'])?> g</label></div>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>CHO</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['cho'],$_REQUEST['q'],$_REQUEST['u'])?> g</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Na</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['na'],$_REQUEST['q'],$_REQUEST['u'])?> mg</label></div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Ca</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['ca'],$_REQUEST['q'],$_REQUEST['u'])?> mg</label></div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Fiber</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['fiber'],$_REQUEST['q'],$_REQUEST['u'])?> g</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-8 col-xs-8"><label><strong>Chole</strong></label></div>
                        <div class="col-md-4 col-xs-4 text-right"><label><?=calfd($result_food['choles'],$_REQUEST['q'],$_REQUEST['u'])?> mg</label></div>
                    </td>
                </tr>
            </table>
            <!--             <div class="col-md-6 col-xs-6"> </div>-->
            <table width="100%">

                <tr>
                    <td bgcolor="#000000" height="5px"></td>
                </tr>

            </table>
            <table class="table" width="100%">
                <tr>
                    <td><span>K</span></td>
                    <td class="text-right"><span><?=calfd($result_food['k'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                    <td><span>MG</span></td>
                    <td class="text-right"><span><?=calfd($result_food['mg'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                </tr>
                <tr>
                    <td><span>P</span></td>
                    <td class="text-right"><span><?=calfd($result_food['p'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                    <td><span>Fe</span></td>
                    <td class="text-right"><span><?=calfd($result_food['fe'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                </tr>

                <tr>
                    <td><span>CU</span></td>
                    <td class="text-right"><span><?=calfd($result_food['cu'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                    <td><span>Mn</span></td>
                    <td class="text-right"><span><?=calfd($result_food['mn'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                </tr>
                <tr>
                    <td><span>Zn</span></td>
                    <td class="text-right"><span><?=calfd($result_food['zn'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                    <td><span>Co</span></td>
                    <td class="text-right"><span><?=calfd($result_food['co'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                </tr>

                <tr>
                    <td><span>Vit B1</span></td>
                    <td class="text-right"><span><?=calfd($result_food['b1'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                    <td><span>Moist</span></td>
                    <td class="text-right"><span><?=calfd($result_food['moist'],$_REQUEST['q'],$_REQUEST['u'])?> g</span></td>
                </tr>
                <tr>
                    <td><span>Ash</span></td>
                    <td class="text-right"><span><?=calfd($result_food['ash'],$_REQUEST['q'],$_REQUEST['u'])?> g</span></td>
                    <td><span>Se</span></td>
                    <td class="text-right"><span><?=calfd($result_food['se'],$_REQUEST['q'],$_REQUEST['u'])?> mg</span></td>
                </tr>
            </table>

        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 text-right">
                <span>*ร้อยละของปริมาณสารอาหารที่แนะนำให้บริโภคต่อวันสำหรับคนไทยอายุตั้งแต่ 6 ปีขึ้นไปโดยคิดจากความต้องการพลังงานวันละ 2,000 กิโลแคลอรี่</span>
            </div>
        </div>
    </div>
</div>