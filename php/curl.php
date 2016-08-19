<?php
function callApi($URL,$type,$params,$headers){  
    $ch = curl_init();  
    $timeout = 5;  
    curl_setopt ($ch, CURLOPT_URL, $URL); //发贴地址  
    if($headers!=""){  
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);  
    }else {  
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type: text/json'));  
    }  
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
    switch ($type){  
        case "GET" : curl_setopt($ch, CURLOPT_HTTPGET, true);break;  
        case "POST": curl_setopt($ch, CURLOPT_POST,true);   
                     curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;  
        case "PUT" : curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");   
                     curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;  
        case "DELETE":curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");   
                      curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;  
    }  
    $file_contents = curl_exec($ch);//获得返回值  
    curl_close($ch);
    return $file_contents;
} 

//使用
$key = 123;
$url = "";
$params = json_encode($docarray);
$headers = array('Content-type: text/json',"key:$key");
$syncresult = callApi($url,"PUT",$params,$headers);