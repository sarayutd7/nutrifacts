<?php
ob_start();
session_start();
include('conn/config.php');
include('conn/function.inc.php');
db_connect();
$sql_user_login = "select  * from member where memberUsername = '".$_SESSION['session_user']."'";
$result_user_login = get_a_line($sql_user_login);
//--------------------------------------

$last_number = get_a_line("select f_code from foodmenu order by f_code desc limit 1"); //num_record('foodmenu',"order by f_code desc");

$f_code = $last_number[f_code]+1;
 
if(!empty($_SESSION['session_user'])){
    $sql_insert = "insert into foodmenu set f_code ='00$f_code',
                                        type_status = '".$_REQUEST['type_status']."', 
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
                                        type_modity_datetime = '".date('Y-m-d H:i:s')."'";
    insert_data($sql_insert);
    
    //---------------------------------------------------------------------------------------------------------------
    $insert_log ="insert into foodmenu_log set 
                                        f_code = '".$_REQUEST['f_code']."',
                                        type_status = '".$_REQUEST['type_status']."', 
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
                                        
                                        taskactive = 'Edit Recode',
                                        active_datetime = '".date('Y-m-d H:i:s')."'";
        
    insert_data($insert_log);
    //---------------------------------------------------------------------------------------------------------------------------  
    // exit();
    echo PHPgourl('index.php?task=mgmt_foodmenu');
    
}
?>