<?php



function rtx_post($url, $post_data) {  
  
  $postdata = http_build_query($post_data);  
  $options = array(  
    'http' => array(  
      'method' => 'POST',  
      'header' => 'Content-type:application/x-www-form-urlencoded',  
      'content' => $postdata,  
      'timeout' => 15 * 60 
    )  
  );  
  $context = stream_context_create($options);  
  $result = file_get_contents($url, false, $context);  
  
  return $result;  
}  
  
$msg =  iconv('UTF-8', 'gbk', $_GET['msg']);


$post_data = array(  
  'sender' => 'robot',  
  'pwd' => 'robot',  
  'receivers' => 'julian',  
  'msg' => $msg,  
  'sessionid' => '123123'  
);  

$rep = rtx_post('http://192.168.172.2:8012/SendIM.cgi', $post_data);  

echo $rep;