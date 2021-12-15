<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF=8");
}
function constellation($month, $day)
{
    $signs = [
        # 星座の名前          /星座始まりの月日            /星座終わりの月日  
        ["name" => "牡羊座", "period_start" => [3, 21], "period_end" => [4, 19]],
        ["name" => "牡牛座", "period_start" => [4, 20], "period_end" => [5, 20]],
        ["name" => "双子座", "period_start" => [5, 21], "period_end" => [6, 21]],
        ["name" => "蟹座", "period_start" => [6, 22], "period_end" => [7, 22]],
        ["name" => "獅子座", "period_start" => [7, 23], "period_end" => [8, 22]],
        ["name" => "乙女座", "period_start" => [8, 23], "period_end" => [9, 22]],
        ["name" => "天秤座", "period_start" => [9, 23], "period_end" => [10, 23]],
        ["name" => "蠍座", "period_start" => [10, 24], "period_end" => [11, 22]],
        ["name" => "射手座", "period_start" => [11, 23], "period_end" => [12, 21]],
        ["name" => "山羊座", "period_start" => [12, 22], "period_end" => [1, 19]],
        ["name" => "水瓶座", "period_start" => [1, 20], "period_end" => [2, 18]],
        ["name" => "魚座", "period_start" => [2, 19], "period_end" => [3, 20]]
    ];
    foreach ($signs as $sign) {
        $start_m = $sign["period_start"][0];
        $start_d = $sign["period_start"][1];
        $end_m = $sign["period_end"][0];
        $end_d = $sign["period_end"][1];
        if (($month == $start_m && $day >= $start_d) || ($month == $end_m && $day <= $end_d)) {
            return $sign["name"];
        }
    }
}
$month = filter_input(INPUT_GET, "month", FILTER_VALIDATE_INT);
$day = filter_input(INPUT_GET, "day", FILTER_VALIDATE_INT);
$sign = constellation($month, $day);
?>
<!DOCTYPE html>
<h1>星座チェック</h1>
<?php if (empty($month or $day)) : ?>
    <p>月日を入力してください｡</p>
    <form method="get">
        <input name="month" type="number" min="1" max="12">月
        <input name="day" type="number" min="1" max="31">日
        <input type="submit" value="OK">
    </form>
<?php else : ?>
    <p><?= ($month) . "月" . ($day) . "日生まれは" . $sign . "です" ?> </p>
<?php endif; ?>