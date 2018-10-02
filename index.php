<?php
require "/opt/app-root/src/predis/autoload.php";
Predis\Autoloader::register();


session_start();

$i = isset($_SESSION['i']) ? $_SESSION['i'] : 0;
echo "Counter is = ";
echo ++$i;

$_SESSION['i'] = $i;


echo "<br><br>";
// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
try {
//    $redis = new Predis\Client();
//rfs-redisfailover.ha-redis-cluster.svc - 172.30.85.91
    
    
    
    //$redis = new Predis\Client(array(
      //  "scheme" => "tcp",
        //"host" => "172.30.150.190",
       // "port" => 6379));

    
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "172.30.85.91",
        "port" => 6379));

    
    echo "Successfully connected to Redis";

$redis->set("hello_world", "Hi from Swati Kale!!!!");                                     
$value = $redis->get("hello_world");                                            
var_dump($value);    
    
    echo "<br><br>";
    
$redis->set("visit_counter", $i);                                     
$counter_value = $redis->get("visit_counter");                                            
var_dump($counter_value);    
    
    echo "<br><br>";
                                                                                
echo ($redis->exists("Aliens")) ? "true" : "false";

}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}
