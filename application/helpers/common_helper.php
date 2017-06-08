<?php
////////////////////////////////
// common function //
////////////////////////////////

/*
 * 프로세스 종료
 */
function dieProcess()
{
    echo "die";
    die;
}
function sendCURLPost($url,$params)
{
    if(!$url) return false;

    $postData = '';
    
    foreach($params as $k => $v) 
    { 
        $postData .= $k . '='.$v.'&'; 
    }
    $postData = rtrim($postData, '&');

    $ch = curl_init();  
                                
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
                                                         
    $output=curl_exec($ch);
                                                              
    curl_close($ch);
    return $output;
}

function sendCURLGet($url,$params)
{
    if(!$url) return false;

    $postData = '';
    
    foreach($params as $k => $v) 
    { 
        $postData .= $k . '='.$v.'&'; 
    }
    $postData = rtrim($postData, '&');

    $url .= "?".$postData;

    $ch = curl_init();  
    
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                                                         
    $output=curl_exec($ch);

    //$output = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $output);
    
    curl_close($ch);
    return $output;
}

