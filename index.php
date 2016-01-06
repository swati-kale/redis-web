<?php
require "predis/autoload.php";
PredisAutoloader::register();

// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
try {
//    $redis = new PredisClient();

    $redis = new PredisClient(array(
        "scheme" => "tcp",
        "host" => "redis.cloudapps-640a.oslab.opentlc.com",
        "port" => 6379));

    echo "Successfully connected to Redis";
}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}
