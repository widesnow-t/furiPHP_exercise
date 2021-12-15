<?php
function createMsg($attack, $enemy, $dmg)
{
    $msg = <<< EOM
    {$attack}は,
    {$enemy}に攻撃した.

    クリティカルヒット!!

    {$enemy}は, {$dmg}のダメージをうけた｡ \n

EOM;
    echo $msg;
}
function getDamage($attack)
{
    return rand(100, 500) * $attack;
}
