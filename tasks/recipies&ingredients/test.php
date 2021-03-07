<?php

$arr = ['a' => 1, 'b' => 2, 'c' => 1, 'd' => 1];

var_dump(array_filter($arr, function($k) {
return $k == 1;
}, ARRAY_FILTER_USE_BOTH));