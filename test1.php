<?php

session_start();
include_once('config.php');
$token=$_SESSION['token']['access_token'];
echo $token;
$data='{
	"version": "2.0",        
	    "host": "api.weibo.com", 
			    "radio_type": "gsm",   
					    "request_address": true, 
								"decode_pos": true,       
	"cell_towers": [              
	   {
       "cell_id": "4466",             
			"location_area_code": "26630", 
      "mobile_country_code": "460", 
			"signal_strength": "-60"     
			}
		]
	}';
	$fields=array(
	'access_token'=>$token,
	'json'=>$data
	);
	$url = "https://api.weibo.com/2/location/mobile/get_location.json?source=".WB_AKEY."&access_token=$token";
	#$url = "https://api.weibo.com/2/location/mobile/get_location.json?source=".WB_AKEY;
	echo '<br/>';
	echo $url;
	echo '<br/>';
	#$header = array('Content-type: application/json','access_token: '.$token);
	$header = array('Content-type: application/json');
	$ch = curl_init() or die (curl_error()) ;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_TIMEOUT,3);
		curl_setopt($ch,CURLOPT_POST,true);
				curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	curl_setopt($ch, CURLOPT_HEADER,1);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);	

	$result = curl_exec($ch) or die (curl_error($ch));
		curl_close($ch);
		echo $result;
				
