<?php 
//エスケープ処理を行う関数
function h($str)
{
    //ENT_QUOTES:シングルオートとダブルクオートを共に変換する
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function createKg($name, $waz) {

    $msg = <<<EOM
    {$name}は, {$waz}の攻撃をした!\n
    EOM;
    return $msg;
}

function createTg() {
    $msg = <<<EOM
    敵は攻撃をした!\n
    EOM;
    return $msg;
}
function last1($name) {
    $msg = <<< EOM
    {$name}は敵を倒した!!!\n
    EOM;
    return $msg;
    }
function last2() {
    $msg = <<< EOM
    引き分け!!\n
    EOM;
    return $msg;
}
function last3($name) {
    $msg = <<< EOM
    {$name}は負けた。。。\n
    EOM;
    return $msg;
}


?>