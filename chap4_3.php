<?php
require_once __DIR__ . '/chap4_pet.php';
$owners = [
    ["name" => "斎藤", "animal" => ["猫", "猫", "猫"]],
    ["name" => "鈴木", "animal" => ["柴犬"]],
    ["name" => "藤井", "animal" => ["猫", "チワワ", "うさぎ"]],
];
foreach ($owners as $owner) {
    displayMsg($owner);
}
