<?php
require_once __DIR__ . '/functions.php';
$name = '';
$hp = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $hp = filter_input(INPUT_POST, 'hp');
    $thp = filter_input(INPUT_POST, 'thp');
    $select = filter_input(INPUT_POST, 'select');
    $kg = filter_input(INPUT_POST, 'kg');
    $tg = filter_input(INPUT_POST, 'tg');

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
                    $message = "クリティカルヒット!";
            }
        }
        if ($thp -= $attack) {
            if ($thp > 0) {
                if (isset($kg)) {
                    $kg = createKg($name, $waz);
                }
            }
            if ($thp < 0) {
                $thp = 0;
            }
        }
        if ($tkn = rand(0, 3000)) {
            if ($tkn === 0) {
                    $messages = "攻撃に失敗!";
            }
            if ($tkn >= 2000) {
                    $messages = "クリティカルヒット!!";
            }
        }
        if ($hp -= $tkn) {
            if ($hp > 0) {
                if (isset($tg)) {
                    $tg = createTg();
                }
            }
            if ($hp < 0) {
                $hp = 0;
            }
        }
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
                <p><?= h($kg) ?></p>
                <p><?= h($message) ?></p>
                <p><?= h("攻撃力:" . $attack) . "の攻撃" ?></p>
                <p> <?= h("敵のHP :" . $thp) ?></p>
            <?php endif ?>
            <?php if ($name) : ?>
                <p class="thp"> <?= h($name . "のHP :" . $hp) ?></p>
            <?php endif ?>
        </div>
        <div id="container" class="fight">
            <h1 id="itemA" class="page_game">FIGHT!!</h1>
            <?php if ($hp === 0 || $thp === 0) : ?>
                <div id="itemB" class="last"><?= h($last) ?></div>
                <a id="itemD" class="butt" href="start.php">スタートへ戻る</a>
            <?php endif ?>
            <?php if ($hp > 0 && $thp > 0) : ?>
                <p id="itemB" class="grid-itemB"> <?= h($name . "さん") ?></p>
                <p id="itemD" class="grid-itemD"><?= "攻撃技は？" ?></p>
                <form class="form-area" action="" method="post">
                    <select id="itemC" name="select">
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
                    <input type="hidden" name="kg" value="<?= h($kg) ?>">
                    <input type="hidden" name="tg" value="<?= h($tg) ?>">
                    <input id="itemE" class="kou" type="submit" value="攻撃">
                </form>
            <?php endif ?>
        </div>
        <div class="logo2"><img class="robot" src="../game/images/enemy.png" alt="">
            <?php if ($tg) : ?>
                <p> <?= h($tg) ?></p>
                <p><?= h($messages) ?></p>
                <p><?= h("攻撃力" . $tkn . "攻撃") ?></p>
                <p> <?= h($name . "のHP :" . $hp) ?></p>
            <?php endif ?>
            <?php if ($name) : ?>
                <p class="thp"> <?= h("敵のHP :" . $thp) ?></p>
            <?php endif ?>
        </div>
    </div>
</body>