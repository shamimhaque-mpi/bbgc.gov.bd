<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// genetate tender code
function generator($table, $prefix = '') {
    $code = '';
    // get codeigniter instanse
    $CI = & get_instance();
    // load model
    $CI->load->model('action');
    // use model method
    $val = $CI->action->forIdGenerator($table);

    if(!empty($val)){
        $id = intval($val[0]->id) + 1;
    } else {
        $id = 1;
    }

    if($prefix != ''){
        $code = $prefix.$id;
    } else {
        $code = $id;
    }

    return $code;
}




  function incomeFiledId($table,$digit = 4) {
        $code = '';
        $counter = 1;
    
        // get codeigniter instanse
        $CI = & get_instance();
    
        // load model
        $CI->load->model('action');
    
        // use model method
        $val = $CI->action->maxId($table);
    
    
        if(is_array($val)){
        $counter = intval($val[0]->maxId) + 1;
        } else {
        $counter = 1;
        }
        $counter = str_pad($counter,$digit,0,STR_PAD_LEFT);
        return $counter;
    }
    



function get_month_name($month){

    if($month == 1 ){
        echo 'January';
    }else if($month == 2){
        echo 'February';
    }else if($month == 3){
        echo 'March';
    }else if($month == 4){
        echo 'April';
    }else if($month == 5){
        echo 'May';
    }else if($month == 6){
        echo 'June';
    }else if($month == 7){
        echo 'July';
    }else if($month == 8){
        echo 'August';
    }else if($month == 9){
        echo 'September';
    }else if($month == 10){
        echo 'October';
    }else if($month == 11){
       echo 'November';
    }else{
       echo 'December'; 
    }
    
}




// genetate tender code
function generateUniqueId($table) {
    $code = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = & get_instance();

    // load model
    $CI->load->model('action');

    // use model method
    $val = $CI->action->maxId($table);


    if(is_array($val)){
        $counter = intval($val[0]->maxId) + 1;
    } else {
        $counter = 1;
    }

    if(strlen($counter) == 2) {
        $counter = '00' . $counter;
    } elseif(strlen($counter) == 3) {
        $counter = '0' . $counter;
    } else {
        $counter = '000' . $counter;
    }
    return $counter;
}

// genetate tender code
function memberId($table, $b, $t) {
    $branch = $b;
    $year = date('y');
    $team = $t;
    $id = generateUniqueId($table);

    $memberId = $branch . $year . $team . $id;
    return $memberId;
}

function age($date){
    list($year, $month, $day) = explode("-", $date);

    $doy = date('Y') - $year;
    $dom = date('m') - $month;
    $dod = date('d') - $day;

    if($dod < 0 || $dom < 0) $doy--;

    return $doy;
}

/*
// set default CRUD message
function message($type, $emit = '<p>Undefine warning ! Error not detected.</p>') {
    $message = '';

    switch ($type) {
        case 'success':
            $message = '<div class="alert alert-info" style="margin-top:15px;">'
            . '<h3><i class="fa fa-check-circle"></i> Success message</h3>'
            . '<p>Data saved successfully completed ! Message confirm.</p>'
            . '</div>';

            break;
        case 'update':
            $message = '<div class="alert alert-success" style="margin-top:15px;">'
            . '<h3><i class="fa fa-pencil-square-o"></i> Update message</h3>'
            . '<p>Data update successfully completed ! Message confirm.</p>'
            . '</div>';

            break;
        case 'delete':
            $message = '<div class="alert alert-danger" style="margin-top:15px;">'
            . '<h3><i class="fa fa-times-circle"></i> Delete message</h3>'
            . '<p>Data remove successfully completed ! Message confirm.</p>'
            . '</div>';

            break;
        case 'warning':
            $message = '<div class="alert alert-warning" style="margin-top:15px;">'
            . '<h3><i class="fa fa-exclamation-triangle"></i> Warning message</h3>'
            . $emit
            . '</div>';

            break;

			 case 'warning_login':
             $message = $emit;

            break;
        case 'operation':
            $message = '<div class="alert alert-primary" style="margin-top:15px;">'
            . '<h3><i class="fa fa-certificate"></i> Operation confirmation</h3>'
            . $emit
            . '</div>';

            break;
        default:
            $message = '<div class="alert alert-primary" style="margin-top:15px;">'
            . '<h3><i class="fa fa-bolt"></i> Default message</h3>'
            . '<p>Unknown message confirmation!</p>'
            . '</div>';

            break;
    }

    return $message;
}
*/
/*Maruf hasan's Helper*/
    function custom_fetch($var,$field){
        if (isset($var)) {
            return $var[0]->$field;
        }
    }
    
   function filter($value){
    $capitalize="";
    $rmv_scor=str_replace("_"," ", $value);
    if (mb_detect_encoding($rmv_scor)!='UTF-8') {
        $capitalize=ucwords($rmv_scor);
    }else{
        $capitalize=$rmv_scor;
    }

    return $capitalize;
}

// genetate unique code
function generateUniqueSerial($table,$digit = 4) {
    $code = '';
    $counter = 1;

    // get codeigniter instanse
    $CI = & get_instance();

    // load model
    $CI->load->model('action');

    // use model method
    $val = $CI->action->maxId($table);


    if(is_array($val)){
        $counter = intval($val[0]->maxId) + 1;
    } else {
        $counter = 1;
    }
    $counter = str_pad($counter,$digit,0,STR_PAD_LEFT);
    return $counter;
}





function ck_menu($menu){
    $CI = & get_instance();
    $CI->load->model('action');
    $user_data =$CI->session->all_userdata();
    $privilege = $CI->data["privilege"];
    $user_id = $user_data["user_id"];

    if(($privilege=="super") || ($privilege=="admin")){
        return true;
    }

    $where = array(
        "privilege_name" => $privilege,
        "user_id" => $user_id
    );

    $data = $CI->action->read("privileges",$where);
    if($data==null){
        return false;
    }

    $access_array = json_decode($data[0]->access,true);
    $access_array = array_keys($access_array);

    if(in_array($menu,$access_array)){
        return true;
        //echo "Matched";
    }
    //return false;
}


function ck_action($menu,$action){
    $CI = & get_instance();
    $CI->load->model('action');
    $user_data =$CI->session->all_userdata();
    $privilege = $CI->data["privilege"];
    $user_id = $user_data['user_id'];
    
    
    if(($privilege=="super") || ($privilege=="admin")){
        return true;
    }

    $where = array(
        "privilege_name" => $privilege,
        "user_id"        => $user_id
    );

    $data = $CI->action->read("privileges",$where);
    
    if($data==null){
        return false;
    }

    $access_array = json_decode($data[0]->access,true);
    //return $access_array;

    if(!array_key_exists($menu,$access_array)){
        return false;
    }

    if(in_array($action,$access_array[$menu])){
        return true;
    }
    
    return false;
}





function message_length($strlength, $message = NULL){
	$messLen = 0;
	
	if (strlen($message) != strlen(utf8_decode($message))) {
                if( $strlength <= 63){ $messLen = 1; }
		else if( $strlength <= 126){ $messLen = 2; }
		else if( $strlength <= 189){ $messLen = 3; }
		else if( $strlength <= 252){ $messLen = 4; }
		else if( $strlength <= 315){ $messLen = 5; }
		else if( $strlength <= 378){ $messLen = 6; }
		else if( $strlength <= 441){ $messLen = 7; }
		else if( $strlength <= 504){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }		
        }else{
		if( $strlength <= 160){ $messLen = 1; }
		else if( $strlength <= 306){ $messLen = 2; }
		else if( $strlength <= 459){ $messLen = 3; }
		else if( $strlength <= 612){ $messLen = 4; }
		else if( $strlength <= 765){ $messLen = 5; }
		else if( $strlength <= 918){ $messLen = 6; }
		else if( $strlength <= 1071){ $messLen = 7; }
		else if( $strlength <= 1080){ $messLen = 8; }
		else { $messLen = "Equal to an MMS."; }
		
        }
        
        return $messLen;
	
}


function f_number($data, $point=null){
    if (!empty($point)){
        return number_format($data, $point);
    }
    return number_format($data);
}


