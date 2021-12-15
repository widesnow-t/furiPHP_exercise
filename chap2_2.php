<?php
var_dump("数字を入力してください");
$num = trim(fgets(STDIN));
if ($num & 1) {
    var_dump("奇数です｡");
} else {
    var_dump("偶数です｡");
}
