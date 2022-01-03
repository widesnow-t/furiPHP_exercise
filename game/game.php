<?php
require_once __DIR__ . '/functions.php';
$name = '';
$hp = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $hp = filter_input(INPUT_POST, 'hp');
    $thp = filter_input(INPUT_POST, 'thp');
    $select = filter_input(INPUT_POST, 'select');

    if (empty($hp)) {
        $hp = 10000;
        $thp = 10000;
    }

    if (isset($select)) {
        switch ($select) {
            case '1':
                $waz = "パンチ";
                break;
            case '2':
                $waz = "キック";
                break;
            case '3':
                $waz = "投げ技";
                break;
            case '4':
                $waz = "気功";
                break;
            case '5':
                $waz = "爆弾";
                break;
            case '6':
                $waz = "投げキッス";
                break;
            default:
                return;
        }
        if ($attack = rand(0, 3000)) {
            if ($attack === 0) {
                $message = "攻撃に失敗";
            }
            if ($attack >= 2000) {
                $message = "クリティカルヒット!!";
            }
        }
        if ($thp -= $attack) {
            if ($thp < 0) {
                $thp = 0;
            }
        }
        $kg = createKg($name, $waz);
        if ($tkn = rand(0, 3000)) {
            if ($tkn === 0) {
                $messages = "攻撃に失敗!";
            }
            if ($tkn >= 2000) {
                $messages = "クリティカルヒット!!";
            }
        }
        if ($hp -= $tkn) {
            if ($hp < 0) {
                $hp = 0;
            }
        }
        $tg = createTg();
    }
}
if ($hp > 0 && $thp > 0) {
    $select = filter_input(INPUT_POST, 'select');
}
if ($hp === 0 || $thp === 0) {
    if ($hp > 0 && $thp === 0) {
        $last = last1($name);
    }
    if ($hp === 0 && $thp === 0) {
        $last = last2();
    }
    if ($hp === 0 && $thp > 0) {
        $last = last3($name);
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=DotGothic16&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="css/style.css" rel="stylesheet">
    <title>game</title>


<body>
    <div class="big-game">
            <div class="logo1">
                <img class="mouse" src="../game/images/me.png" alt="">
                <?php if ($kg) : ?>
                    <li class="li"><?= h($kg) ?></li>
                    <?= h($message) ?>
                    <li class="li"><?= h("攻撃力:" . $attack) . "の攻撃" ?></li>
                    <li class="li"> <?= h("敵のHP :" . $thp) ?></li>
                <?php endif ?>
                <?php if ($name) : ?>
                    <li class="thp"> <?= h($name . "のHP :" . $hp) ?></li>
                <?php endif ?>
            </div>
            <div class="fight">
                <h1 class="page_game">FIGHT!!</h1>
                <?php if ($hp === 0 || $thp === 0) : ?>
                    <li class="last"><?= h($last) ?></li>
                    <a class="butt" href="start.php">スタートへ戻る</a>
                <?php endif ?>
                <?php if ($hp > 0 && $thp > 0) : ?>
                    <form class="form-area" action="" method="post">
                        <li class="attack"> <?= h($name . "さん") ?></li>
                        <li class="attack"><?= "攻撃技は？" ?></li>
                            <select name="select" id="">
                                <option value="1">パンチ</option>
                                <option value="2">キック</option>
                                <option value="3">投げ技</option>
                                <option value="4">気功</option>
                                <option value="5">爆弾</option>
                                <option value="6">投げキッス</option>
                            </select>
                            <input type="hidden" name="name" value="<?= h($name) ?>">
                            <input type="hidden" name="hp" value="<?= h($hp) ?>">
                            <input type="hidden" name="thp" value="<?= h($thp) ?>">
                            <input class="kou" type="submit" value="攻撃">
                        </form>
                <?php endif ?>
            </div>
            <div class="logo2"><img class="robot" src="../game/images/enemy.png" alt="">
                <?php if ($tg) : ?>
                    <li class="li"> <?= h($tg) ?></li>
                    <?= h($messages) ?>
                    <li class="li"><?= h("攻撃力" . $tkn . "攻撃") ?></li>
                    <li class="li"> <?= h($name . "のHP :" . $hp) ?></li>
                <?php endif ?>
                <?php if ($name) : ?>
                    <li class="thp"> <?= h("敵のHP :" . $thp) ?></li>
                <?php endif ?>
            </div>
    </div>
</body>