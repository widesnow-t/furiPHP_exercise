<?php
$HP = 10000;
while ($HP > 0) {
    echo "攻撃技は？" . "\n" . "1,剣  2,魔法  3,打撃" . "\n";
    $age = trim(fgets(STDIN));
    if ($age == 1 || $age == 2 || $age == 3) {
        $attack = rand(500, 3000);
    } else {
        echo "攻撃に失敗!" . "\n";
    }
    if ($attack >= 2000) {
        echo "クリティカルヒット！！" . "\n";
    }
    if ($HP - $attack > 0) {
        $HP = $HP - $attack;
    } else {
        $HP = 0;
    }
    echo "攻撃力" . $attack . "の攻撃！" . "\n";
    echo "HP:" . $HP . "\n";
}
echo "敵を倒した！";
