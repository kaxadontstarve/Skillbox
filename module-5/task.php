<?php 
$arr = [1,2,3,4,5];
$str = "hellokaxa";
$result = explode(' ', $str);
var_dump($result);
$result = implode('', $arr);
var_dump($result);
foreach($arr as $key => $ar) {
    if($ar > 3){
        echo "number is {$key} go to home";
    }
}