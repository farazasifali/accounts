<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 7:19 PM
 */

function info($expression)
{
    echo "<pre>";
    print_r($expression);
    echo "</pre>";
}

function message()
{
    $CI =& get_instance();
    $output = "";
    $flashdata = $CI->session->userdata("flashdata");
    if(isset($flashdata) && !empty($flashdata)){
        if($flashdata['status'] == 'success'){
            $output = '<div class="alert alert-success">'.$flashdata['message'].'</div>';
        } else {
            $output = '<div class="alert alert-danger">'.$flashdata['message'].'</div>';
        }
        $CI->session->unset_userdata('flashdata');
    }
    return $output;
}

function setMessage($status, $message)
{
    $CI =& get_instance();
    $CI->session->set_userdata("flashdata", array(
                "status" => $status,
                "message" => $message
            ));
}