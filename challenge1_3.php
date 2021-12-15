<?php
$team_a = ["勇者", "戦士", "魔法使い"];
$team_b = ["盗賊", "忍者", "商人"];
$team_c = ["スライム", "ドラゴン", "魔王"];
$all_teams = [$team_a, $team_b, $team_c];
foreach ($all_teams as $all_team) {
    echo $all_team[0] . "\n";
    echo $all_team[1] . "\n";
    echo $all_team[2] . "\n";
}
