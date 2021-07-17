<?php 
 //RandomString()
function RandomString($n){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters)-1);
        $randstring .= $characters[$index];
    }
    return $randstring;
}
?>