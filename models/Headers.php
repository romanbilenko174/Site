<?php
class Headers
{
	 public static function getHeader($path)
	{
		$headerdata = ROOT.'/static/settings/headers.php';
    $headers = include($headerdata);
    foreach ($headers as $header => $name) {
    	$num = preg_replace("/[^0-9]/", '', $path);
    	$z = preg_replace ("/[^a-zа-я\s]/si","",$path);
    	if (preg_match("~$header~", $path)) {
    		if ($num){
    			  if($z == 'product') {
    					$data = Product::getProductById($num)['name'];
    				}
    				elseif($z =="category"){
    					$data = Category::getCategoryById($num)['name'];
    				}
    				else{
    					$data = "Новые Строительные Технологии";
    			}
    			return $data;
    	}
    	else{
    		return $name;
    }
      	}
	}
}
}
?>