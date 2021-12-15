<?php
require_once __DIR__ . "/chap4_area.php";
$top = 10;
$bottom = 20;
$height = 30;
$area = calcArea($top, $bottom, $height);
displayMsg(10, 20, 30, $area);
$top = 40;
$bottom = 50;
$height = 60;
$area = calcArea($top, $bottom, $height);
displayMsg(40, 50, 60, $area);
