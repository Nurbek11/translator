<?php
require 'vendor/autoload.php';

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->select(1);

$translates = $redis->sMembers("all:translates");

foreach ($translates as $translate) {
        $tr = $redis->get("translate:{$translate}");
        dd($tr);
}

