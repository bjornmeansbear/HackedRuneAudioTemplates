#!/usr/bin/php
<?php

$redis = new Redis();
$redis->connect('/tmp/redis.sock');

if (FALSE === $redis->get('dynVolumeKnob')) {
    $redis->set('dynVolumeKnob', '1');
}

