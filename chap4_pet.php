<?php
function displayMsg($owner)
{
    $animal_types = array_unique($owner["animal"]);
    $animal = implode(",", $animal_types);
    $count = count($owner["animal"], COUNT_RECURSIVE);

    $msg = <<<EOM
{$owner["name"]}さんは
{$animal}を
{$count}匹飼ってます｡\n
EOM;
    echo $msg;
}
