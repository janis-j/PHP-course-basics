<?php
$r = "you have bullseye";
$t = explode(" ",$r);
foreach($t as $p){
    if(strlen($p)%2===0){
        echo strtoupper($p) . " ";
    }else{
        echo $p . " ";
    }
}
