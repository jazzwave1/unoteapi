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
