<?php
function calcArea ($name1, $name2, $name3) {
$cnt = ($name1 + $name2) * $name3/ 2;
return $cnt;
}

function displayMsg ($t, $b, $h, $cnt) {
$msg = <<<EOM
台形のサイズ 
上底:{$t} 
下底:{$b} 
高さ:{$h} 
面積:{$cnt}\n 
EOM; 
echo $msg; }