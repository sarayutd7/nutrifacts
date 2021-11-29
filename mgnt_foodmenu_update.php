<?php
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//--------------------------------------


 
if(!empty($_SESSION['session_user'])){
    $result_foodmenu_old = get_a_line("select * from foodmenu where f_code = '".$_REQUEST['item_id']."'");
    $insert_log ="insert into foodmenu_log set 
                                        f_code = '".$result_foodmenu_old['f_code']."',
                                        type_status = '".$result_foodmenu_old['type_status']."', 
                                        food_type = '".$result_foodmenu_old['food_type']."', 
                                        
                                        thai_name = '".$result_foodmenu_old['thai_name']."', 
                                        food_substitutes = '".$result_foodmenu_old['food_substitutes']."', 
                                        
                                        cal = '".$result_foodmenu_old['cal']."', 
                                        prot = '".$result_foodmenu_old['prot']."', 
                                        fat = '".$result_foodmenu_old['fat']."', 
                                        cho = '".$result_foodmenu_old['cho']."', 
                                        na = '".$result_foodmenu_old['na']."', 
                                        k = '".$result_foodmenu_old['k']."', 
                                        ca = '".$result_foodmenu_old['ca']."', 
                                        mg = '".$result_foodmenu_old['mg']."', 
                                        p = '".$result_foodmenu_old['p']."', 
                                        fe = '".$result_foodmenu_old['fe']."', 
                                        cu  = '".$result_foodmenu_old['cu']."', 
                                        mn = '".$result_foodmenu_old['mn']."', 
                                        zn = '".$result_foodmenu_old['zn']."', 
                                        co  = '".$result_foodmenu_old['co']."', 
                                        b1 = '".$result_foodmenu_old['b1']."', 
                                        moist = '".$result_foodmenu_old['moist']."', 
                                        ash = '".$result_foodmenu_old['ash']."', 
                                        fiber = '".$result_foodmenu_old['fiber']."', 
                                        choles = '".$result_foodmenu_old['choles']."', 
                                        se = '".$result_foodmenu_old['se']."', 
                                        serving = '".$result_foodmenu_old['serving']."', 
                                        gi = '".$result_foodmenu_old['gi']."', 
                                        
                                        reference_wt = '".$result_foodmenu_old['reference_wt']."', 
                                        reference_food = '".$result_foodmenu_old['reference_food']."', 
                                        reference_fm = '".$result_foodmenu_old['reference_fm']."',   
                                        
                                        type_notice = '".$result_foodmenu_old['type_notice']."', 
                                        type_modify_by = '".$_SESSION['session_user']."',
                                        
                                        taskactive = 'Edit Recode',
                                        active_datetime = '".date('Y-m-d H:i:s')."'";
        
    insert_data($insert_log);
    //---------------------------------------------------------------------------------------------------------------------------    
    
    $sql_update = "update foodmenu set type_status = '".$_REQUEST['type_status']."', 
                                        food_type = '".$_REQUEST['food_type']."', 
                                        
                                        thai_name = '".$_REQUEST['thai_name']."', 
                                        food_substitutes = '".$_REQUEST['food_substitutes']."', 
                                        
                                        cal = '".$_REQUEST['cal']."', 
                                        prot = '".$_REQUEST['prot']."', 
                                        fat = '".$_REQUEST['fat']."', 
                                        cho = '".$_REQUEST['cho']."', 
                                        na = '".$_REQUEST['na']."', 
                                        k = '".$_REQUEST['k']."', 
                                        ca = '".$_REQUEST['ca']."', 
                                        mg = '".$_REQUEST['mg']."', 
                                        p = '".$_REQUEST['p']."', 
                                        fe = '".$_REQUEST['fe']."', 
                                        cu  = '".$_REQUEST['cu']."', 
                                        mn = '".$_REQUEST['mn']."', 
                                        zn = '".$_REQUEST['zn']."', 
                                        co  = '".$_REQUEST['co']."', 
                                        b1 = '".$_REQUEST['b1']."', 
                                        moist = '".$_REQUEST['moist']."', 
                                        ash = '".$_REQUEST['ash']."', 
                                        fiber = '".$_REQUEST['fiber']."', 
                                        choles = '".$_REQUEST['choles']."', 
                                        se = '".$_REQUEST['se']."', 
                                        serving = '".$_REQUEST['serving']."', 
                                        gi = '".$_REQUEST['gi']."', 
                                        
                                        reference_wt = '".$_REQUEST['reference_wt']."', 
                                        reference_food = '".$_REQUEST['reference_food']."', 
                                        reference_fm = '".$_REQUEST['reference_fm']."',   
                                        
                                        type_notice = '".$_REQUEST['type_notice']."', 
                                        type_modify_by = '".$_SESSION['session_user']."', 
                                        type_modity_datetime = '".date('Y-m-d H:i:s')."' where f_code = '".$_REQUEST['item_id']."'";
    update_data($sql_update);
    // exit();
    echo PHPgourl('index.php?task=mgmt_foodmenu');
    
}
?>