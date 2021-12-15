<?php
var_dump("上底は？");
$top = fgets(STDIN);
var_dump("下底は？");
$bottom = fgets(STDIN);
var_dump("高さは？");
$height = fgets(STDIN);
var_dump("面積は" . ($top + $bottom) * $height / 2);
