<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // 경고메세지를 경고창으로
    function alert($msg='', $url='') 
    {
        $CI =& get_instance();
        echo '<meta http-equiv="content-type" content="text/html; charset='.$CI->config->item('charset').'">';
        echo '<script type="text/javascript">';
        if($msg)
        {
            echo 'alert("'.$msg.'");';
        }
        echo "page_out = false;";
        
        echo (($url) ? 'window.location.replace("'.$url.'");' : "window.history.go(-1);");
        echo "</script>";
        exit;
    }

    // 경고메세지 출력후 창을 닫음
    function alert_close($msg, $reload = false) 
    {
        $CI =& get_instance();

        echo '<meta http-equiv="content-type" content="text/html; charset='.$CI->config->item('charset').'">';
        echo '<script type="text/javascript">alert("'.$msg.'");';
        echo "page_out = false;";
        if($reload == "opener_reload") 
        {
            echo "opener.window.location.reload();";
        }
        else if($reload == "parent_reload")
        {
            echo "parent.window.location.reload();";
        }
        else if($reload == "reload")
        {
            echo "window.location.reload();";
        }
        else
        {
            echo "window.close();";
        }
        echo "</script>";
        exit;
    }

    // 경고메세지만 출력
    function alert_only($msg, $exit=false) 
    {
        $CI =& get_instance();

        echo '<meta http-equiv="content-type" content="text/html; charset='.$CI->config->item('charset').'">';
        echo '<script type="text/javascript">alert("'.$msg.'");';
        echo '</script>';
        if($exit == true)
        {
            exit;
        }
    }

    // 경고메세지를 경고창으로
    function alert_parent($msg='', $url='') 
    {
        $CI =& get_instance();

        echo '<meta http-equiv="content-type" content="text/html; charset='.$CI->config->item('charset').'">';
        echo '<script type="text/javascript">alert("'.$msg.'");';
        echo "page_out = false;";
        echo (($url) ? 'parent.window.location.replace("'.$url.'");' : "parent.window.history.go(-1);");
        echo "</script>";
        exit;
    }
?>
