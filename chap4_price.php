<?php
function add($item1, $item2, $item3)
{
    $cnt = $item1 + $item2 + $item3;
    return $cnt;
}
function totalTax($sum)
{
    return floor($sum * 1.1);
}

function displayMsg($name, $sum, $price)
{
    $msg = <<<EOM
{$name}様
ご注文承りました｡
合計{$sum}円です｡
{$price}円税込みとなります｡\n
EOM;
    echo $msg;
}
