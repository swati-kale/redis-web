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
//rfs-redisfailover.ha-redis-cluster.svc - 172.30.85.91 or 10.129.2.107?
    
    
    
   // $redis = new Predis\Client(array("scheme" => "tcp","host" => "10.128.5.10","port" => 8001));
    
//$redis = new Predis\Client(array("scheme" => "tcp","host" => "172.30.57.94","port" => 6379));
    //$redis = new Predis\Client(array("scheme" => "tcp","host" => "10.129.2.81","port" => 14626,"password"=> "testdb"));
    //redis-14626.redis-ent-cluster.redis-ent-cluster.svc.cluster.local
     $redis = new Predis\Client(array("scheme" => "tcp","host" => "172.30.174.153" port" => 14626));
   //$sentinels = ['tcp://172.30.85.91'];
//$options   = ['replication' => 'sentinel', 'service' => 'mymaster'];
//$redis = new Predis\Client($sentinels, $options);
    
    echo "Successfully connected to Redis";
$redis->set("hello_world", "**********Hi from Swati Kale!*************");                                     
$value = $redis->get("hello_world");                                            
var_dump($value);    
    
    echo "<br>*****<br>";
    
$redis->set("visit_counter", $i);                                     
$counter_value = $redis->get("visit_counter");                                            
var_dump($counter_value);    
    
    echo "<br><br>";
                                                                                
//echo ($redis->exists("Aliens")) ? "true" : "false";
}
catch (Exception $e) {
    echo "<br>Error encountered.<br>";
    echo $e->getMessage();
}
